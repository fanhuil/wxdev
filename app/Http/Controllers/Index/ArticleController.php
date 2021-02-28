<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * 文章列表页
     */
    public function index(){

        return view('index.article.index');
    }

    /**
     * 文章详情页
     */
    public function show(Request $request){


        return view('index.article.show');
    }
}

