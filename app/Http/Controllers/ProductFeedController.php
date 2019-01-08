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
        // if ($_GET('next_id') != '') {
            $next_id = $_GET('next_id');
            $feed = Product::with(['ProductImage', 'Project', 'Project->Brand'])
                ->orderby('updated_at', 'desc')->skip(next_id)->take(10)
                // ->select(
                //     'Project->id             as project_id',
                //     'Project->name           as project_name',
                //     'Project->Brand->id      as brand_id',
                //     'Project->Brand->name    as brand_name',
                //     'Project->Brand->caption as brand_logo',
                //     'name                    as product_name',
                //     'proce                   as product_price',
                //     'caption                 as product_caption',
                //     'ProductImage->path      as product_image_path'
                // )
                ->get();
        } else {
            $feed = Product::with([
                'productimages', 'projects', 'projects.brands'
            ])
                ->orderby('updated_at', 'desc')->take(10)
                // ->select(
                //     'Project->id             as project_id',
                //     'Project->name           as project_name',
                //     'Project->Brand->id      as brand_id',
                //     'Project->Brand->name    as brand_name',
                //     'Project->Brand->caption as brand_logo',
                //     'name                    as product_name',
                //     'proce                   as product_price',
                //     'caption                 as product_caption',
                //     'ProductImage->path      as product_image_path'
                // )
                ->get();
        }
        return response()->json($feed);
    }
}
