<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {
        $string = $request->ip();
        file_put_contents('ip.html', $string . "-", FILE_APPEND);
        return $string;
        $hotArticle = Article::where('is_hot', 1)->get();
        return view('index.index', compact('hotArticle'));


        


    }

    # 顺序查找法
    public function order_search()
    {

    }

    # 二分查找法
    public function binray_search()
    {

    }

    # 冒泡排序
    public function bubble_sort()
    {

    }

    # 选择排序
    public function select_sort()
    {

    }

    # 插入排序
    public function insert_sort()
    {

    }
}
