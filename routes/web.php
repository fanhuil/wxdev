<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 网站首页
Route::get('/','Index\ArticleController@index')->name('/');

// 测试路由
Route::get('/test',function(){
   dd(app("auth.password"));
});
// 前台路由
include base_path('routes/index/index.php');

// 后台路由
include base_path('routes/admin/admin.php');



//Route::get('/', function () {
//    return view('welcome');
//});
