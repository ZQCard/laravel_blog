<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Article;

class SearchController extends BaseController
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $articles = Article::orderBy('id','desc')
                    ->where('content', 'like', '%'.$keyword.'%')
                    ->orWhere('title', 'like', '%'.$keyword.'%')
                    ->select(['id', 'title', 'poster', 'excerpt'])
                    ->paginate($this->pageSize);
        $this->title = $keyword;
        return view('home.search',[
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
