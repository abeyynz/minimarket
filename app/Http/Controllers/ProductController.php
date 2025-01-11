<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockLog;
use App\Models\Store;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request){
        $search = $request->get('search_product', '');
        $products = Product::where('store_id', Auth::user()->store_id)
            ->where('stock', '>', 0)
            ->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('code', 'like', "%$search%");
            })
            ->paginate(9);
        $data['products'] = Product::where('store_id', Auth::user()->store_id)->get();
        return view('products.index', compact('products', 'search'), $data);
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
        $product = Product::create([
            'name' => $validate['name'],
            'unit' => $validate['unit'],
            'price' => $validate['price'],
            'image_url' => $validate['image_url'],
            'stock' => 0,
            'category_id' => $validate['category_id'],
            'code' => $newProductCode,
            'store_id' => Auth::user()->store_id,
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
    public function edit(string $id){
        $data['product'] = Product::where('id', $id)->firstOrFail();
        $data['categories'] = Category::pluck('name', 'id');
        return view('products.edit', $data);
    }
    public function update(Request $request, string $id){
        $product = Product::where('id', $id)->where('store_id', Auth::user()->store_id)->firstOrFail();

        $validate = $request->validate([
            'name' => 'required|max:255',
            'unit' => 'required|max:5',
            'price' => 'required',
            'stock' => 'required',
            'image_url' => 'required|url',
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
            'image_url' => $validate['image_url'],
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
    public function addStock(string $id){
        $data['product'] = Product::where('id', $id)->firstOrFail();
        return view('products.addStock', $data);
    }
    public function updateStock(Request $request, string $id){
        $product = Product::where('id', $id)->firstOrFail();
        $validate = $request->validate([
            'stock' => 'required|integer',
        ]);

        $newStock = $product->stock + $validate['stock'];

        $product->update([
            'stock' => $newStock,
        ]);

        StockLog::create([
            'product_id' => $product->id,
            'change_type' => 'masuk',
            'quantity' => $validate['stock'],
            'description' => 'Stok ditambahkan',
            'store_id' => Auth::user()->store_id,
        ]);

        if($product){
            $notification = array(
                'message' => 'produk berhasil ditambahkan',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'produk gagal ditambahkan',
                'alert-type' => 'error'
            );
        }
        return redirect()->route('product')->with($notification);
    }
    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->where('store_id', Auth::user()->store_id)->firstOrFail();
        $product->delete();

        $notification = array(
            'message' => 'produk berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('product')->with($notification);
    }
    public function showLogs(Request $request)
    {
        $user = Auth::user();
        $storeName = 'Semua Cabang';

        $query = StockLog::with('product', 'user');

        if ($user->hasRole('owner')) {
            if ($request->has('store_id') && $request->store_id != 'all') {
                $query->where('store_id', $request->store_id);
                $storeName = Store::find($request->store_id)->name ?? 'Cabang Tidak Ditemukan';
            }
        } else {
            $query->where('store_id', $user->store_id);
            $storeName = $user->store->name ?? 'Cabang Tidak Ditemukan';
        }
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $stockLogs = $query->paginate(10);

        if ($user->hasRole('owner')) {
            $data['stores'] = Store::all();
        } else {
            $data['stores'] = [];
        }

        return view('products.logs', compact('stockLogs', 'storeName', 'data'));
    }

    public function print(Request $request)
    {
        $query = StockLog::with('product', 'user')
                        ->where('store_id', Auth::user()->store_id);

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $stockLogs = $query->get();

        $storeName = Auth::user()->store->name ?? 'Cabang Tidak Ditemukan';

        $data = compact('stockLogs', 'storeName');

        $pdf = Pdf::loadView('products.print', $data);
        return $pdf->stream('LogStok.pdf');
    }

}
