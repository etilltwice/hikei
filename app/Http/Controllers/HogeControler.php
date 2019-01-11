<?php

namespace App\Http\Controllers;

use App\Eloquents\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HogeControler extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->has('name')) {
            return 'yes';
        } else {
            return $request->name;
        }

        // dd($answer);
    }
}
