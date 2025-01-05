<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $data['stores'] = Store::all();
        return view('stores.index', $data);
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:stores',
            'location' => 'required|string|max:255',
        ]);

        $store = Store::create($validate);

        if ($store) {
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

        return redirect()->route('store')->with($notification);
    }

    public function edit(string $id)
    {
        $data['store'] = Store::findOrFail($id);
        return view('stores.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $store = Store::findOrFail($id);

        $validate = $request->validate([
            'name' => 'required|unique:stores,name,' . $id,
            'location' => 'required|string|max:255',
        ]);

        $store->update($validate);

        if ($store) {
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

        return redirect()->route('store')->with($notification);
    }

    public function destroy(string $id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        $notification = array(
            'message' => 'Cabang berhasil dihapus.',
            'alert-type' => 'success'
        );

        return redirect()->route('store')->with($notification);
    }
}
