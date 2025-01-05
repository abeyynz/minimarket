<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

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
});

Route::group(['middleware' => ['auth', 'role:owner']], function () {
    Route::get('/store/create', [StoreController::class, 'create'])->name('store.create');
    Route::get('/store/edit/{id}', [StoreController::class, 'edit'])->name('store.edit');
    Route::post('/store/store', [StoreController::class, 'store'])->name('store.store');
    Route::patch('/store/{id}/update', [StoreController::class, 'update'])->name('store.update');
    Route::delete('/store/{id}/destroy', [StoreController::class, 'destroy'])->name('store.destroy');
});

require __DIR__.'/auth.php';
