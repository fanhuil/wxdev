<?php



Route::group(['prefix'=>'index','namespace'=>'Index'],function (){
    // 文章列表页
    Route::get('article','ArticleController@index')->name('index.article.index');
    // 文章详情页
    Route::get('article-show/{id}','ArticleController@show')->name('index.article.show');

    // 文章搜索页
    Route::get('search-category/{categoryid}','SearchController@searchCategory')->name('index,search.searchcategory');
});

