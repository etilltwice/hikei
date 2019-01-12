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
        $project_id = $request->project_id;
        $feeds = Project::with(['brands', 'projectimages', 'products', 'products.productimages'])
            ->where('id', $project_id)
            ->first();
        return new \App\Http\Resources\ProjectsInformation($feeds);
    }
}
