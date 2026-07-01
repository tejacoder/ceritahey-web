<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// publik
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product.show');
Route::view('/faq', 'faq')->name('faq');
Route::view('/kebijakan-privasi', 'privacy')->name('privacy');
Route::view('/tentang-kami', 'about')->name('about');
Route::view('/syarat-ketentuan', 'terms')->name('terms');
Route::view('/kontak', 'contact')->name('contact');

// auth
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');

// Keranjang
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{product}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');

// user
Route::middleware('auth')->group(function () {
    Route::get('/order/create/{product:slug}', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order', [OrderController::class, 'store'])->name('order.store');
    Route::get('/order/my', [OrderController::class, 'myOrders'])->name('order.my');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/order/{order}/download', [OrderController::class, 'download'])->name('order.download');
    Route::get('/payment/channels/{order}', [PaymentController::class, 'channels'])->name('payment.channels');
    Route::post('/payment/process', [PaymentController::class, 'process'])->name('payment.process');
    Route::get('/payment/{payment}/waiting', [PaymentController::class, 'waiting'])->name('payment.waiting');
    Route::get('/payment/mock-success', [PaymentController::class, 'mockSuccess'])->name('payment.mock_success');

    // settings user
    Route::get('/settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings');
    Route::put('/settings', [\App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');

    // admin
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::post('products/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::resource('products', AdminProductController::class)->except(['show', 'update']);
        Route::get('orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    });
});

// callback Tripay (no auth)
Route::post('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
