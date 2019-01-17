<?php

namespace App\Http\Controllers;

use App\Eloquents\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

class HogeControler extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function input(Request $request, $product_id = 1)
    {
        $product_id = $request->product_id;
        $feeds = Product::with('projects', 'productimages', 'projects.projectimages')
            ->where('products.id', $product_id)
            ->get();

        // $response = $this->json('POST', new \App\Http\Resources\ProductGet($feeds));
        // $kotoba = 'kotoba';
        // return response()->header('Content-Type', 'application/json');
        $data = response()->json($feeds);
        $input = $data->input('products.project_id');
        return response()->json($input);
        // return redirect()->action('HogeControler@output', ['data' => $data]);
    }

    public function output(Request $request)
    {
        $data = is_null($request->input('json'));
        return response()->json($data);
    }
}
