<?php

namespace App\Http\Controllers;

use App\Eloquents\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function read(Request $request)
    {
        $brand_id = $request->brand_id;
        $feeds = Brand::where('id', $brand_id)
            ->first();
        return new \App\Http\Resources\Brands($feeds);
        // return response()->json($feeds);
    }

    public function update(Request $request)
    {
        Brand::where('id', $request->brand_id)
            ->update([
                'account_id' => $request->account_id,
                'brand_name' => $request->brand_name,
                'website_url' => $request->brand_url,
                'caption' => $request->brand_caption,
                'phone_number' => $request->brand_telephone,
                'logo_path' => $request->brand_logo
            ]);
    }
}
