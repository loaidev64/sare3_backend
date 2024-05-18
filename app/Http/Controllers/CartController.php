<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartStoreRequest;
use App\Http\Requests\CartUpdateRequest;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request): CartCollection
    {
        $carts = Cart::all();

        return new CartCollection($carts);
    }

    public function store(CartStoreRequest $request): CartResource
    {
        $cart = Cart::create($request->validated());

        return new CartResource($cart);
    }

    public function update(CartUpdateRequest $request, Cart $cart): CartResource
    {
        $cart->update($request->validated());

        return new CartResource($cart);
    }
}
