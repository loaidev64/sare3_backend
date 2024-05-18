<?php

namespace App\Http\Controllers;

use App\Http\Resources\BannerCollection;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index(Request $request): BannerCollection
    {
        $banners = Banner::all();

        return new BannerCollection($banners);
    }
}
