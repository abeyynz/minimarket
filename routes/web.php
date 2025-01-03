<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/history-transaksi', [TransaksiController::class, 'index'])->name('history-transaksi');
});

// Route::get('/transactions', [TransaksiController::class, 'index']);
// Route::post('/transactions', [TransaksiController::class, 'store']);

// // Rute untuk kategori
// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');


// Route::get('/index', function () {
//     $posts = Post::all(); // Mengambil semua data dari tabel 'posts'
//     return view('product.index', compact('posts')); // Mengarahkan ke 'about.blade.php'
// })->name('product.index');

// Route untuk menambah post baru (create)
// Route::get('/tambah', function () {
//     return view('tambah'); // Menampilkan form untuk membuat post baru
// })->name('products.tambah');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route untuk menyimpan post baru (store)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::post('/products', [ProductController::class, 'delete'])->name('products.delete');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/history', [TransaksiController::class, 'history'])->name('transaksi.history');

require __DIR__.'/auth.php';
