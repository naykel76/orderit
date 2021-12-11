<?php

use Illuminate\Support\Facades\Route;
use Naykel\Orderit\Controllers\ProductController;
use Naykel\Orderit\Livewire\Checkout;

Route::middleware(['web'])->group(function () {

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/checkout', Checkout::class)->name('checkout');

});



