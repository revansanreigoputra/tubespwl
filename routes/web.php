<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

// Routes untuk CRUD Produk
Route::resource('products', ProductController::class);
