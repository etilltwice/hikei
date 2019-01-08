<?php

namespace App\Http\Controllers;

use App\Eloquents\Brand;
use App\Eloquents\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandPageController extends Controller
{
    public function __invoke(Request $request)
    {
        $brand_id = $_GET('brand_id');
        $data = Product::with(['Product->ProjectImage', 'Project'])
            ->where('id', $brand_id)
            ->select(
                'Project->id             as brand_official',
                'Project->name           as brand_name',
                'Project->Brand->id      as brand_url',
                'Project->Brand->name    as brand_caption',
                'Project->Brand->caption as brand_logo'
            )->first();

        // $dataにproject関連データまとめ入れるためのobjectを生成する
        $project = Project::with('ProjectImage')
            ->where('brand_id', $brand_id)
            ->select(
                'id                 as project_id',
                'name               as project_name',
                'ProjectImage->path as project_image_path'
            )->get();
        $data = $data->combine('project', $project);
        return response()->json($data);
    }
}
