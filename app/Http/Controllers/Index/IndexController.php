<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Article;

class IndexController extends Controller
{
    //
    public function index()
    {
        $hotArticle = Article::where('is_hot',1)->get();
        return view('index.index',compact('hotArticle'));
    }

    # 顺序查找法
    public function order_search(){

    }

    # 二分查找法
    public function binray_search(){

    }

    # 冒泡排序
    public function bubble_sort(){

    }

    # 选择排序
    public function select_sort(){

    }

    # 插入排序
    public function insert_sort(){

    }
}
