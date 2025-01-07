<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $data['products'] = Product::all();
        return view('products.index', $data);
    }
    public function create(){
        $data['categories'] = Category::pluck('name', 'id');
        return view('products.create', $data);
    }
    public function store(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:255',
            'unit' => 'required|max:5',
            'price' => 'required',
            'stock' => 'required|integer|min:1',
            'image_url' => 'required|url',
            'category_id' => 'required|exists:categories,id',
        ]);

        $categoryCode = Category::where('id', $request->category_id)->value('code');

        $lastProduct = Product::where('code', 'like', $categoryCode . '%')->latest('code')->first();

        if ($lastProduct) {
            $lastSequence = (int)substr($lastProduct->code, strlen($categoryCode));
            $newSequence = $lastSequence + 1;
        } else {
            $newSequence = 1;
        }

        $newProductCode = $categoryCode . str_pad($newSequence, 5, '0', STR_PAD_LEFT);

        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs(
                'public/product_image',
                'product_image_'.time() . '.' . $request->file('image')->extension()
            );
            $validate['image'] = basename($path);
        }
        $product = Product::create([
            'name' => $validate['name'],
            'unit' => $validate['unit'],
            'price' => $validate['price'],
            'stock' => $validate['stock'],
            'image_url' => $validate['image_url'],
            'category_id' => $validate['category_id'],
            'code' => $newProductCode,
        ]);
        if($product){
            $notification[] = array(
                'message' => 'produk berhasil disimpan',
                'alert-type' => 'success'
            );
        }else{
            $notification[] = array(
                'message' => 'produk gagal disimpan',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('product')->with($notification);
    }
    public function edit(string $code){
        $data['product'] = Product::where('code', $code)->firstOrFail();
        $data['categories'] = Category::pluck('name', 'id');
        return view('products.edit', $data);
    }
    public function update(Request $request, string $code){
        $product = Product::where('code', $code)->firstOrFail();
        $validate = $request->validate([
            'name' => 'required|max:255',
            'unit' => 'required|max:5',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'category_id' => 'required|max:5'
        ]);

        if ($request->category_id != $product->category_id) {
            $newCategoryCode = Category::where('id', $request->category_id)->value('code');

            $lastProduct = Product::where('code', 'like', $newCategoryCode . '%')->latest('code')->first();

            if ($lastProduct) {
                $lastSequence = (int)substr($lastProduct->code, strlen($newCategoryCode));
                $newSequence = $lastSequence + 1;
            } else {
                $newSequence = 1;
            }

            $newProductCode = $newCategoryCode . str_pad($newSequence, 5, '0', STR_PAD_LEFT);

            $product->code = $newProductCode;
        } else {
            $newProductCode = $product->code;
        }

        if($request->hasFile('image')){
            if($product->image != null){
                Storage::delete('public/product_image/'.$request->old_image);
            }
            $path = $request->file('image')->storeAs(
                'public/product_image',
                'product_image_'.time() . '.' . $request->file('image')->extension()
            );
            $validate['image'] = basename($path);
        }
        $product->update([
            'name' => $validate['name'],
            'unit' => $validate['unit'],
            'price' => $validate['price'],
            'stock' => $validate['stock'],
            'image' => $validate['image'],
            'category_id' => $validate['category_id'],
            'code' => $newProductCode
        ]);

        if($product){
            $notification = array(
                'message' => 'produk berhasil disimpan',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'produk gagal disimpan',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('product')->with($notification);
    }
    public function destroy(string $id){
        $product = product::findOrFail($id);
        Storage::delete('public/product_image/'.$product->old_image);
        $product->delete();
        $notification = array(
            'message' => 'produk berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('product')->with($notification);
    }
}
