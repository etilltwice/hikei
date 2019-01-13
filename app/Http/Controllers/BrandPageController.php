<?php

namespace App\Http\Controllers;

use App\Eloquents\Brand;
use App\Eloquents\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandPageController extends Controller
{
    public function __invoke(Request $request)
    {
        $brand_id = $request->brand_id;
        // $feeds = Brand::with(['projects'])
        //     ->where('brands.id', $brand_id)
        //     ->first();
        $feeds = \DB::table('brands')
            ->where('id', $brand_id)
            ->select(
                'account_id  as brand_official',
                'brand_name  as brand_name',
                'website_url as brand_url',
                'caption     as brand_caption',
                'logo_path   as brand_logo'
            )
            ->get();

        // projectimage作成
        $child = \DB::table('project_images')
            ->join('projects', 'project_images.project_id', '=', 'projects.id')
            ->join('brands', 'brands.id', '=', 'projects.brand_id')
            ->where('brands.id', $brand_id)
            ->orderby('project_images.updated_at', 'desc')
            ->select(
                'project_images.path as project_image_path',
                'projects.id         as project_id',
                'projects.name       as project_name'
            )
            ->get();
        $projectimages = ['projectimages' => $child];

        // データの統合
        $feeds->push($projectimages);

        return response()->json($feeds);
        // return new \App\Http\Resources\BrandPage($feeds);
    }
}
