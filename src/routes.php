<?php

use Illuminate\Support\Facades\Route;
use Naykel\Orderit\Controllers\ProductController;

Route::middleware(['web'])->group(function () {

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

});



