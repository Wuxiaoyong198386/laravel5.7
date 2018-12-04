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

/**
 * 运营端路由
 */
Route::prefix('admin')->group(function () {

    Route::get('arealist','admin\AreaController@GetAreaList')->middleware("checkAdminUser");      //获取列表数据
    Route::post('updatearea','admin\AreaController@UpdateArea');    //修改
    Route::post('insertarea','admin\AreaController@InsertArea');    //插入
    Route::post('deletearea','admin\AreaController@DeleteArea');    //删除

    Route::post('redis','admin\RedisController@TestReids')->middleware("checkAdminUser");    //删除



});
