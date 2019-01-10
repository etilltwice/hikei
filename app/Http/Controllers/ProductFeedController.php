<?php

namespace App\Http\Controllers;

use App\Eloquents\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFeedController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->has('next_id')) {
            $next_id = $Request->next_id;
            $feed = \DB::table('product_images')
                ->join('products', 'product_images.product_id', '=', 'products.id')
                ->join('projects', 'products.id', '=', 'projects.product_id')
                ->join('brands', 'brands.id', '=', 'projects.brand_id')
                ->orderby('product_images.updated_at', 'desc')
                ->skip($next_id)
                ->take(10)
                ->select(
                    'projects.id         as project_id',
                    'projects.name       as project_name',
                    'brands.id           as brand_id',
                    'brands.brand_name   as brand_name',
                    'brands.logo_path    as brand_logo',
                    'products.name       as product_name',
                    'products.price      as product_price',
                    'products.caption    as product_caption',
                    'product_images.path as product_image_path'
                )
                ->get();
        } else {
            $feed = \DB::table('product_images')
                ->join('products', 'product_images.product_id', '=', 'products.id')
                ->join('projects', 'products.id', '=', 'projects.product_id')
                ->join('brands', 'brands.id', '=', 'projects.brand_id')
                ->orderby('product_images.updated_at', 'desc')
                ->take(10)
                ->select(
                    'projects.id         as project_id',
                    'projects.name       as project_name',
                    'brands.id           as brand_id',
                    'brands.brand_name   as brand_name',
                    'brands.logo_path    as brand_logo',
                    'products.name       as product_name',
                    'products.price      as product_price',
                    'products.caption    as product_caption',
                    'product_images.path as product_image_path'
                )
                ->get();
        }
        return response()->json($feed);
    }
}
