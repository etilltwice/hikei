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
        $data = Brand::with(['projects', 'projects.projectimages', 'projects.products'])
            ->where('id', $brand_id)
            ->first();

        return response()->json($data);
    }
}
