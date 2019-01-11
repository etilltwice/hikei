<?php

namespace App\Http\Controllers;

use App\Eloquents\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function read(Request $request)
    {
        $project_id = $request->project_id;
        $feeds = Project::with(['brands', 'projectimages', 'products', 'products.productimages'])
            ->where('id', $project_id)
            ->first();
        return new \App\Http\Resources\ProjectsGet($feeds);
        // return response()->json($feeds);
    }
}
