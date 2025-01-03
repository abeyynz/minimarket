<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest'); // Memastikan pengguna harus login
    }
        public function index()
    {
        $transaksi = \App\Models\Transaksi::latest()->paginate(10); // Ambil data transaksi
        return view('dashboard', compact('transaksi'));
    }

}
