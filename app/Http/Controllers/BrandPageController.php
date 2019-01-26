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
        $data = \DB::table('brands')
            ->where('id', $brand_id)
            ->select(
                'account_id',
                'brand_name',
                'website_url',
                'caption',
                'logo_path'
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

        // project_image_pathの加工
        foreach ($child as $element) {
            $element->project_image_path = secure_asset('storage/' . $element->project_image_path);
        }

        // 送信データの整形
        $feeds = (object)[
            'account_id' => $data[0]->account_id,
            'brand_name' => $data[0]->brand_name,
            'website_url' => $data[0]->website_url,
            'caption' => $data[0]->caption,
            'logo_path' => $data[0]->logo_path,
            'projectimages' => $child
        ];

        // 送信
        return response()->json($feeds);
    }
}
