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

//Route::get('/', function () {
//    return view('welcome');
//});

// 网站首页
Route::get('/','Index\IndexController@index')->name('/');

// 文章列表页
Route::get('/article','Index\ArticleController@index')->name('index.article.index');


Route::get('/article-show','Index\ArticleController@show')->name('index.article.show');

// 后台路由
include base_path('routes/admin/admin.php');
