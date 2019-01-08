<?php

namespace App\Http\Controllers;

use App\Eloquents\Product;
use App\Eloquents\ProductImage;
use App\Eloquents\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function read()
    {
        $product_id = $_GET('product_id');
        $data = Product::with('Project')
            ->where('id', $product_id)
            ->select(
                'name             as product_name',
                'price            as product_price',
                'cost             as product_cost',
                'size             as product_size',
                'caption          as product_caption',
                'Project->id      as project_id',
                'Project->name    as project_name',
                'Project->caption as project_caption'
            )->first();
        $project_id = $data->get('project_id');

        // 各種object生成
        $project_images = ProjectImage::where('project_id', $project_id)
            ->select(
                'path    as project_image_path',
                'caption as project_image_caption'
            )->get();
        $product_images = ProductImage::where('product_id', $product_id)
            ->select(
                'path    as product_image_path',
                'caption as product_image_caption'
            )->get();

        // objectをまとめて投入
        $data = $data->combine(['project_images' => $project_images, 'product_images' => $product_images]);

        return response()->json($data);
    }

    public function update()
    {

    }
}
