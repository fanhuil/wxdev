<?php

namespace App\Http\Controllers\Index;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 文章管理类控制器
 * Class ArticleController
 * @package App\Http\Controllers\Index
 */
class ArticleController extends Controller
{
    /**
     * 文章列表页
     */
    public function index()
    {
        // 文章列表
        $articleList = Article::where('deleted_at', '=', null)->orderBy('is_top', 'desc')->get();

        // 文章分类列表
        $categoryList = Category::all();

        // 热门（推荐）文章列表
        $hotArticle = Article::where([
            ['is_hot', '=', 1],
            ['deleted_at', '=', null],
        ])->get();

        return view('index.article.index', compact('articleList', 'categoryList', 'hotArticle'));
    }

    /**
     * 文章详情页
     */
    public function show($id, Request $request)
    {
        // $articleId = $request->input($id);
        $article = Article::where('id', '=', $id)->get();
        $article = $article[0];
        return view('index.article.show', compact('article'));
    }
}

