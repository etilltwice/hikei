<?php

namespace App\Http\Controllers;

use App\Eloquents\Project;
use App\Eloquents\TempImage;
use App\Http\Resources\ProjectsGet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function read(Request $request, $brand_id)
    {
        // プロジェクトデータ取得
        $feeds = Project::where('brand_id', $brand_id)
            ->get();

        $back = \App\Http\Resources\ProjectsGet::collection($feeds);
        // return new \App\Http\Resources\ProjectsGet($feeds);
        return response()->json($back);
    }

    public function create(Request $request)
    {
        // トランザクション
        $project_id = DB::transaction(function () use ($request) {
            // 代数挿入
            // $json = json_decode($request->input('project_image'));
            $json = $request->input('project_image');

            // project作成
            $project = Project::create([
                'name' => $request->input('project_name'),
                'caption' => $request->input('project_caption'),
                'brand_id' => $request->input('project_brand_id'),
            ]);

            // 画像ファイル登録作業
            foreach ($json as $project_image) {
                // パス取得 及び加工
                $temp_path = TempImage::where('id', $project_image->temp_image_id)
                    ->select('path')
                    ->first();
                $path = str_replace('temp/', '', $temp_path->path);
                $trans_path = 'public/' . $path;

                // 画像データ移動
                Storage::move($temp_path->path, $trans_path);

                // テーブル挿入
                DB::table('project_images')->insert([
                    'path' => $path,
                    'project_id' => $project->id,
                    'caption' => $project_image->project_image_caption
                ]);

                // temptableのデータを消去
                TempImage::where('id', $project_image->temp_image_id)
                    ->delete();
            }
            // トランザクションの中身を出力
            return $project->id;
        });
        // createのレスポンス
        $back = ['project_id' => $project_id];
        return response()->json($back);
    }

    public function image(Request $request)
    {
        // パス取得 及び加工
        $temp_path = TempImage::where('id', $request->input('temp_image_id'))
            ->select('path')
            ->first();
        $path = str_replace('temp/', '', $temp_path->path);
        $trans_path = 'public/' . $path;

        // 画像データ移動
        Storage::move($temp_path->path, $trans_path);
        $project_id = DB::table('project_images')->insertGetId([
            'path' => $path,
            'project_id' => $request->input('project_id'),
            'caption' => $request->input('project_image_caption')
        ]);

        // temptableのデータを消去
        TempImage::where('id', $request->input('temp_image_id'))
            ->delete();
        $back = ['project_id' => $project_id];
        return response()->json($back);
    }
}
