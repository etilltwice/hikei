<?php

namespace App\Http\Controllers;

use App\Eloquents\Product;
use App\Eloquents\ProductImage;
use App\Eloquents\ProjectImage;
use Application\json;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function read(Request $request)
    {
        $product_id = $request->product_id;
        $feeds = Product::with('projects', 'productimages', 'projects.projectimages')
            ->where('products.id', $product_id)
            ->get();

        return new \App\Http\Resources\ProductGet($feeds);
        // return response()->json($feeds);
    }

    public function create(Request $request)
    {
        return $request;
        // $product->$request->input('product.id');
        // dd($product);


    }
}
