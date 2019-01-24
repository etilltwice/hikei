<?php

namespace App\Http\Controllers;

use App\Eloquents\TempImage;
use App\Http\Controllers\Controller;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TempImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $path = $request->images->store('temp');
        $image_id = \DB::table('temp_images')->insertGetId([
            'path' => $path,
        ]);
        return response()->json($image_id);
    }
}
