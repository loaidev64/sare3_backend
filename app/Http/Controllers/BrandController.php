<?php

namespace App\Http\Controllers;

use App\Http\Resources\BrandCollection;
use App\Models\Brand;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\ResponseFromApiResource;

#[Group("Brand")]
class BrandController extends Controller
{
    #[ResponseFromApiResource(
        name: BrandCollection::class,
        model: Brand::class
    )]
    public function index(Request $request): BrandCollection
    {
        $brands = Brand::all();

        return new BrandCollection($brands);
    }
}
