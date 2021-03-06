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
    public function read(Request $request, $brand_id)
    {
        $feeds = Brand::where('id', $brand_id)
            ->first();
        return new \App\Http\Resources\Brands($feeds);
        // return response()->json($feeds);
    }

    public function update(Request $request, $brand_id)
    {
        // account_idが空白ではないか
        if (is_null($request->input('account_id'))) {
            return $msg = 'アカウント名を入力してください';
        } else {
            Brand::where('id', $brand_id)
                ->update([
                    'brand_official' => $request->input('account_id'),
                    'brand_name' => $request->input('brand_name'),
                    'brand_url' => $request->input('brand_url'),
                    'brand_caption' => $request->input('brand_caption'),
                    'phone_phonenumber' => $request->input('brand_telephone'),
                    'brand_logo' => $request->input('brand_logo')
                ]);
            return $msg = 'ブランド情報を更新しました';
        }
    }
}
