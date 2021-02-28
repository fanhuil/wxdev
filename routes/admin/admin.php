<?php
/**
 * Created by PhpStorm.
 * User: 86187
 * Date: 2021/1/11
 * Time: 23:47
 */


//后台路由

//路由分组

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    //  登录提示
    Route::get('login','LoginController@index')->name('admin.login');
    //  登陆处理
    Route::post('login','LoginController@login')->name('admin.login');

    Route::resource('article','ArticleController',['names'=>['index'=>'admin.artcle.index']]);

    // 文章管理路由
    Route::group(['middleware'=>['ckadmin']],function(){
        // 退出
        Route::get('logout','LoginController@logout')->name('admin.logout');

        // 后台首页显示
        Route::get('index','IndexController@index')->name('admin.index');

        // 欢迎界面显示
        Route::get('welcome','IndexController@welcome')->name('admin.welcome');

        // 用户列表界面
        Route::get('user/index','UserController@index')->name('admin.user.index');

        // 用户添加界面
        Route::get('user/create','UserController@create')->name('admin.user.create');

        // 用户添加处理
        Route::post('user/store','UserController@store')->name('admin.user.store');

        // 测试集成vue
        Route::post('user/textaxios','UserController@testAxios')->name('admin.user.axios');
    });
});


