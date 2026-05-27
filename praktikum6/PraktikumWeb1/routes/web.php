<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/user', [userController::class, 'index']);

Route::get('/', function () {
    return 'Selamat Datang di Laravel';
});

Route::get('/hello', function () {
    return 'Produk ID: ' . $id;
});

Route::get('/dashboard', function () {
    return 'Halaman Dashboard';
})->name('dashboard');

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/products', function () {
        return 'Data Products';
    });
});

Route::get('products', ProductController::class);