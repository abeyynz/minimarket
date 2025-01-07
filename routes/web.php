<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaksiController;

use Illuminate\Http\Request;

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
    Route::get('/store', [StoreController::class, 'index'])->name('store');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/product', [ProductController::class, 'index'])->name('product');
});

Route::group(['middleware' => ['auth', 'role:owner']], function () {
    Route::get('/store/create', [StoreController::class, 'create'])->name('store.create');
    Route::get('/store/edit/{id}', [StoreController::class, 'edit'])->name('store.edit');
    Route::post('/store/store', [StoreController::class, 'store'])->name('store.store');
    Route::patch('/store/{id}/update', [StoreController::class, 'update'])->name('store.update');
    Route::delete('/store/{id}/destroy', [StoreController::class, 'destroy'])->name('store.destroy');
});

Route::group(['middleware' => ['auth', 'role:manager']], function () {
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::patch('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::group(['middleware' => ['auth', 'role:inventory']], function () {
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::patch('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::patch('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/addStock/{id}', [ProductController::class, 'addStock'])->name('product.addStock');
    Route::patch('/product/{id}/updateStock', [ProductController::class, 'updateStock'])->name('product.updateStock');
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard/history-transaksi', [TransaksiController::class, 'index'])->name('history-transaksi');
// });

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

//transaksi
// Route::get('/transactions', function () {
//     return view('transactions.index');
// });
// Route::get('/transactions/history_transaction', function () {
//     return view('transactions.history_transaction');
// });


require __DIR__.'/auth.php';
