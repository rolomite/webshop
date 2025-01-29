<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('store');
Route::resource('cart', CartController::class)->names('cart');
Route::post('checkout', [CartController::class, 'checkout'])
    ->middleware('auth')
    ->name('checkout');
Route::get('/store/{product}', [ShopController::class, 'show'])->name('store.product');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');


Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::redirect('/', 'admin/dashboard')->name('admin');
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::resource('settings', SettingsController::class);
    Route::resource('products', ProductController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
