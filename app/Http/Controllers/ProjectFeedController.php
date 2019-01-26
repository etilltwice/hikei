<?php

namespace App\Http\Controllers;

use App\Eloquents\Project;
use App\Http\Resources\ProjectFeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectFeedController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $next_id = '')
    {
        if (isset($next_id)) {
            $feeds = \DB::table('project_images')
                ->join('projects', 'project_images.project_id', '=', 'projects.id')
                ->join('brands', 'brands.id', '=', 'projects.brand_id')
                ->orderby('project_images.updated_at', 'desc')
                ->skip($next_id)
                ->take(10)
                ->select(
                    'projects.id            as project_id',
                    'projects.name          as project_name',
                    'projects.caption       as project_caption',
                    'project_images.id      as project_image_id',
                    'project_images.caption as project_image_caption',
                    'project_images.path    as project_image_path',
                    'brands.id              as brand_id',
                    'brands.logo_path       as brand_logo'
                )
                ->get();
        } else {
            $feeds = \DB::table('project_images')
                ->join('projects', 'project_images.project_id', '=', 'projects.id')
                ->join('brands', 'brands.id', '=', 'projects.brand_id')
                ->orderby('project_images.updated_at', 'desc')
                ->take(10)
                ->select(
                    'projects.id            as project_id',
                    'projects.name          as project_name',
                    'projects.caption       as project_caption',
                    'project_images.id      as project_image_id',
                    'project_images.caption as project_image_caption',
                    'project_images.path    as project_image_path',
                    'brands.id              as brand_id',
                    'brands.logo_path       as brand_logo'
                )
                ->get();
        }

        //url加工
        foreach ($feeds as $feed) {
            $feed->project_image_path = secure_asset('public/' . $feed->project_image_path);
        }

        return response()->json($feeds);
    }
}
