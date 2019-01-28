<?php

namespace App\Http\Controllers;

use App\Eloquents\Product;
use App\Eloquents\ProductImage;
use App\Eloquents\ProjectImage;
use App\Eloquents\TempImage;
use Application\json;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function read(Request $request)
    {
        $product_id = $request->product_id;
        $feeds = Product::with('projects', 'productimages', 'projects.projectimages')
            ->where('products.id', $product_id)
            ->get();

        return new \App\Http\Resources\ProductGet($feeds);
        // return response()->json($feeds);
    }

    public function create(Request $request)
    {
        // テスト用
        // $json = json_decode($request->input('image_numbers'));

        // トランザクション
        // $product_id = DB::transaction(function () use ($request, $json) {
        $product_id = DB::transaction(function () use ($request) {
            // product作成
            $product_id = \DB::table('products')->insertGetId([
                'name' => $request->input('product_name'),
                'price' => $request->input('product_price'),
                'cost' => $request->input('product_cost'),
                'size' => $request->input('product_size'),
                'caption' => $request->input('product_caption'),
            ]);

            // projectにプロダクトIDを注入する
            \DB::table('projects')
                ->where('id', $request->input('project_id'))
                ->update([
                    'product_id' => $product_id,
                ]);

            // テスト用
            for ($count = 0; $count < count($json); $count++) {
                 // パス取得 及び加工
                $temp_path = TempImage::where('id', $json[$count])
                    ->select('path')
                    ->first();
                $path = str_replace('temp/', '', $temp_path->path);
                $trans_path = 'public/' . $path;


                // 画像データ移動
                Storage::move($temp_path->path, $trans_path);
                DB::table('product_images')->insert([
                    'path' => $path,
                    'product_id' => $product_id
                ]);

                // temptableのデータを消去
                TempImage::where('id', $json[$count])
                    ->delete();
            }    // トランザクションの中身を出力
            return $product_id;
        });
        // createのレスポンス
        $back = ['product_id' => $product_id];
        return $back;
    }
}
