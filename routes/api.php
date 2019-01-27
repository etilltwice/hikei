<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// projectfeed O
Route::get('/project_feeds/{next_id?}', 'ProjectFeedController');

// productfeed O
Route::get('/product_feeds/{next_id?}', 'ProductFeedController');

// ブランドページ O
Route::get('/brand_page/{brand_id}', 'BrandPageController');

//ブランド情報取得 O
Route::get('/brand/{brand_id}', 'BrandController@read');

// ブランド情報更新 O
Route::post('/brand/{brand_id}', 'BrandController@update');

// プロジェクト情報取得 O
Route::get('/project_view/{project_id}', 'ProjectViewController');

// ブランド関連プロジェクト取得 O
Route::get('/project/{brand_id}', 'ProjectController@read');

// プロジェクト作成 O
Route::post('/project', 'ProjectController@create');

// プロジェクト画像簡易アップロード
Route::post('/project/image', 'ProjectController@image');

// プロダクト情報取得 O
Route::get('/product/{product_id}', 'ProductController@read');

// ここ以下はテスト前
// プロダクト情報作成 O
Route::post('/product', 'ProductController@create');

// 仮イメージテーブル O
Route::post('/image_upload', 'TempImageController');

// 色々のテスト用
Route::get('/hoge/{product_id?}', 'HogeControler@input');
Route::get('/hogehoge', 'HogeControler@output');
