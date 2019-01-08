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
        $brand_id = $_GET('brand_id');
        $data = Brand::where('id', $brand_id)
            ->select(
                'account_id',
                'name         as brand_name',
                'website_url  as brand_url',
                'caption      as brand_caption',
                'phone_number as brand_telephone',
                'logo_path    as brand_logo'
            )->first();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $brand_id = $_GET('brand_id');
        Brand::where('id', $brand_id)
            ->update([
                'account_id' => $request['account_id'],
                'brand_name' => $request['brand_name'],
                'website_url' => $request['brand_url'],
                'caption' => $request['brand_caption'],
                'phone_number' => $request['brand_telephone'],
                'logo_path' => $request['brand_logo']
            ]);
    }
}
