<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = Category::all();
        return view('categories.index', $data);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:categories,name',
            'code' => 'required|string|size:3|unique:categories,code',
        ]);

        $category = Category::create($validate);

        if ($category) {
            $notification = array(
                'message' => 'Berhasil menambahkan cabang minimarket baru',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Gagal menambahkan',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('category')->with($notification);
    }

    public function edit(string $id)
    {
        $data['category'] = Category::findOrFail($id);
        return view('categories.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validate = $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'code' => 'required|string|size:3|unique:categories,code',
        ]);

        $category->update($validate);

        if ($category) {
            $notification = array(
                'message' => 'Data cabang berhasil diperbarui.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Data gagal diperbarui.',
                'alert-type' => 'error'
            );
        }

        return redirect()->route('category')->with($notification);
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        $notification = array(
            'message' => 'Cabang berhasil dihapus.',
            'alert-type' => 'success'
        );

        return redirect()->route('category')->with($notification);
    }
}
