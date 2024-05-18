<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request): ProductCollection
    {
        $products = Product::all();

        return new ProductCollection($products);
    }

    public function show(Request $request, Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}
