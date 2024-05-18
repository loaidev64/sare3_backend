<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandCollection;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request): BrandCollection
    {
        $brands = Brand::all();

        return new BrandCollection($brands);
    }
}
