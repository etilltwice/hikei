<?php

namespace App\Http\Controllers;

use App\Eloquents\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandPageController extends Controller
{
    public function __invoke(Request $request)
    {
        $brand_id = $request->brand_id;
        $feeds = Brand::with(['projects', 'projects.products'])
            ->where('brands.id', $brand_id)
            ->first();

        return new \App\Http\Resources\BrandPage($feeds);
    }
}
