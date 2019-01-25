<?php

namespace App\Http\Controllers;

use App\Eloquents\Project;
use App\Eloquents\TempImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function read(Request $request)
    {
        // プロジェクトデータ取得
        $project_id = $request->project_id;
        $feeds = Project::with(['projectimages'])
            ->where('id', $project_id)
            ->first();
        return new \App\Http\Resources\ProjectsGet($feeds);
        // return response()->json($feeds);
    }

    public function create(Request $request)
    {
        // プロジェクト作成機能
        // テスト用
        $json = json_decode($request->input('project_image'));

        // トランザクション
        $project_id = DB::transaction(function () use ($request, $json) {
        // $project_id = DB::transaction(function () use ($request) {
            // project作成
            $project_id = \DB::table('projects')->insertGetId([
                'name' => $request->input('project_name'),
                'caption' => $request->input('project_caption'),
                'brand_id' => $request->input('project_brand_id'),
            ]);

            // 画像ファイル登録作業
            // テスト用
            foreach ($json as $project_image) {
            // foreach ($request->input('temp_image') as $project_image) {
                // パス取得 及び加工
                $temp_path = TempImage::where('id', $project_image->temp_image_id)
                    ->select('path')
                    ->first();
                $path = str_replace('temp/', '', $temp_path->path);
                $trans_path = 'public/' . $path;

                // 画像データ移動
                Storage::move($temp_path->path, $trans_path);
                DB::table('project_images')->insert([
                    'path' => $path,
                    'project_id' => $project_id,
                    'caption' => $project_image->project_image_caption
                ]);

                // temptableのデータを消去
                TempImage::where('id', $project_image->temp_image_id)
                    ->delete();
            }
            // トランザクションの中身を出力
            return $project_id;
        });
        // createのレスポンス
        return $project_id;
    }

    public function image(Request $request)
    {
        // パス取得 及び加工
        $temp_path = TempImage::where('id', $request->input('temp_image_id'))
            ->select('path')
            ->first();
        $ext = substr($temp_path->path, strrpos($temp_path->path, '.'));
        $trans_path = 'public/' . uniqid() . $ext;

        // 画像データ移動
        Storage::move($temp_path->path, $trans_path);
        DB::table('project_images')->insert([
            'path' => $trans_path,
            'project_id' => $request->input('project_id'),
            'caption' => $request->input('project_image_caption')
        ]);

        // temptableのデータを消去
        TempImage::where('id', $request->input('temp_image_id'))
            ->delete();
    }
}
