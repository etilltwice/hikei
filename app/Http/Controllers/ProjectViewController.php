<?php

namespace App\Http\Controllers;

use App\Eloquents\Project;
use App\Eloquents\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectViewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $project_id = $_GET('project_id');
        $data = Project::with(['ProjectImage', 'Brand', 'Product', 'Product->ProductImage'])
            ->where('id', $project_id)
            ->select(
                'name as project_name',
                'caption                        as project_caption',
                'Brand->id                      as brand_id',
                'Brand->logo_path               as brand_logo',
                'Product->id                    as product_id',
                'Product->name                  as product_name',
                'Product->price                 as product_price',
                'Product->cost                  as product_cost',
                'Product->size                  as product_size',
                'Product->caption               as product_caption',
                'Product->ProductImage->path    as product_image_path',
                'Product->ProductImage->caption as product_image_caption'
            )->first();

        // 複数のprojectimageのデータを収納するためのobject生成
        $project_images = ProjectImage::where('prject_id', $project_id)
            ->select(
                'path    as project_image_path',
                'caption as project_image_caption'
            )->get();

        // 作成したオブジェクトの追加
        $data = $data->combine('project_images', project_images);
        return response()->json($data);
    }
}
