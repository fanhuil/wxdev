<?php

namespace App\Http\Controllers\Index;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * 文章列表页
     */
    public function index(){
        $articleList = Article::all();
        return view('index.article.index',compact('articleList'));
    }

    /**
     * 文章详情页
     */
    public function show(Request $request){
        $articleId = $request->input('id');
        $article = Article::where('id',$articleId)->get();
        $article = $article[0];
        return view('index.article.show',compact('article'));
    }
}

