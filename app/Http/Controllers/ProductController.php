<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    // Show products index page
    public function index()
    {
        return view('products.index'); // make sure your blade is at resources/views/products/index.blade.php
    }

    // API endpoint for DataTables ajax call
    public function apiProducts(Request $request)
    {
        $products = Product::query();

        return DataTables::of($products)
            ->editColumn('stock_alert', function($product) {
                return $product->stock_alert ?? '-';
            })
            ->make(true);
    }
}
