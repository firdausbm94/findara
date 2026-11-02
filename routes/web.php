<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ShopController;

Route::post('/api/chat', [ChatController::class, 'ask']);

Route::get('/', function () {
    return view('home');
});

Route::get('/resume', function () {
    return view('resume');
});

Route::get('/contact', function () {
    return view('contact');
});

// Route untuk Projects dan Preview
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/preview/{id}', [ProjectController::class, 'preview'])->name('project.preview');

// Route untuk Shop & Integrasi Midtrans
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::post('/shop/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
Route::post('/midtrans/callback', [ShopController::class, 'callback'])->name('midtrans.callback');

// Rute sementara untuk tes kirim email pesanan terakhir di lokal
Route::get('/tes-email', function () {
    $order = \App\Models\Order::with('product')->latest()->first();
    if (!$order) {
        return 'Belum ada data pesanan di tabel orders.';
    }

    \Illuminate\Support\Facades\Mail::to($order->customer_email)->send(new \App\Mail\OrderPaidMail($order));
    return 'Email berhasil dikirim ke: ' . $order->customer_email;
});