<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

class IndexController extends BaseController
{
    public function index()
    {
        $articles = Article::orderBy('created_at','desc')->select(['id', 'title', 'poster', 'excerpt'])->paginate(10);
        return view('home.index',[
            'articles' => $articles,
            'tags' => $this->tags,
            'categories' => $this->categories,
            'friend_link' => $this->friend_link,
            'article_recommend' => $this->article_recommend,
        ]);
    }
}
