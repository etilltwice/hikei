<?php

namespace App\Http\Controllers;

use App\Eloquents\TempImage;
use Illuminate\Http\Request;

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
        return response()->json($request->image);
    }
}
