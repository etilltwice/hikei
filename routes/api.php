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

// projectfeed X (has問題)
Route::get('/project_feeds/{next_id?}', 'ProjectFeedController');

// ここ以下はテスト前
// productfeed X
Route::get('/product_feeds/{next_id?}', 'ProductFeedController');

// ブランドページ O
Route::get('/brand_page/{brand_id}', 'BrandPageController');

//ブランド情報取得 O
Route::get('/brand/{brand_id}', 'BrandController@read');

// ブランド情報更新
Route::post('/brand/{brand_id}', 'BrandController@update');

// プロジェクト情報取得　O
Route::get('/project_view/{project_id}', 'ProjectController@read');

// プロダクト情報取得 O
Route::get('/product_get/{product_id}', 'ProductController@read');

// プロダクト情報作成
Route::post('/product', 'ProductController@post');

// 色々のテスト用
Route::get('/hoge/{name?}', 'HogeControler');
