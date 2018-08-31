<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

class IndexController extends BaseController
{
    public function index()
    {
        $articles = Article::orderBy('id','desc')->select(['id', 'title', 'poster', 'excerpt'])->paginate($this->pageSize);
        return view('home.index',[
            'about' => $this->about,
            'title' => $this->title,
            'articles' => $articles,
            'tags' => $this->tags,
            'categories' => $this->categories,
            'friend_link' => $this->friend_link,
            'article_recommend' => $this->article_recommend,
        ]);
    }
}
