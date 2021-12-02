<?php

namespace Naykel\Orderit\Controllers;

Use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Naykel\Orderit\Models\Product;


class ProductController extends Controller
{
    public function index(): View
    {
        return view('orderit::products.index')->with('products', Product::all());
    }

    public function show(Product $product): View
    {
        return view('orderit::products.show')->with('product', $product);
    }
}
