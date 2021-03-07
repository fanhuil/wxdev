<?php

namespace App\Http\Controllers\Index;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * 文章列表页
     */
    public function index()
    {
        $articleList = Article::where('deleted_at','=',null)->orderBy('is_top','desc')->get();

        $categoryList = Category::all();

        $hotArticle = Article::where([
            ['is_hot','=',1],
            ['deleted_at','=',null],
        ])->get();

        return view('index.article.index', compact('articleList','categoryList','hotArticle'));
    }

    /**
     * 文章详情页
     */
    public function show($id, Request $request)
    {
//        $articleId = $request->input($id);
        $article = Article::where('id', $id)->get();
        $article = $article[0];
        return view('index.article.show', compact('article'));
    }
}

