<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\QueryParam;
use Knuckles\Scribe\Attributes\ResponseFromApiResource;

#[Group("Product")]
class ProductController extends Controller
{
    #[ResponseFromApiResource(
        name: ProductCollection::class,
        model: Product::class
    )]
    #[QueryParam(
        'search',
        description: 'the text that you want to search for',
        required: false,
        example: 'test'
    )]
    public function index(Request $request): ProductCollection
    {
        $products = Product::query()
            ->when($request->search, fn ($query) => $query->whereAny([
                'name',
                'description',
            ], 'LIKE', "%{$request->search}%"))
            ->get();

        return new ProductCollection($products);
    }

    #[ResponseFromApiResource(
        name: ProductResource::class,
        model: Product::class
    )]
    public function show(Request $request, Product $product): ProductResource
    {
        return new ProductResource($product);
    }
}
