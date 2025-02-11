<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopProductController::class, 'index'])->name('store');
Route::get('store/products/{product}', [ShopProductController::class, 'show'])->name('store.product');
Route::get('cart', [CheckoutController::class, 'index'])->name('cart');
Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout')->middleware(['auth']);
Route::get('/payment/verify', PaymentCallbackController::class)->name('payment.callback');


Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');


Route::middleware('auth')->prefix('/admin')->name('admin.')->group(function () {
    Route::redirect('/', 'admin/dashboard')->name('admin');

    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
