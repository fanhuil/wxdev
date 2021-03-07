<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;

class SearchController extends Controller
{
    public function searchCategory($categoryid,Request $request){
        $articleList = Article::where('categoryid',$categoryid)->get();
        //dd($articleList);
        return view('index.search.searchcategory',compact('articleList'));
    }
}
