<?php

// 网站首页
Route::get('/','Index\IndexController@index')->name('/');

Route::group(['prefix'=>'index','namespace'=>'Index'],function (){

    // 文章列表页
    Route::get('article','ArticleController@index')->name('index.article.index');
    // 文章详情页
    Route::get('article-show','ArticleController@show')->name('index.article.show');
});

