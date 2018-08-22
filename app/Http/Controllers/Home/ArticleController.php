<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

class ArticleController extends BaseController
{
    public function show($id)
    {
        $article = Article::findOrfail($id);
        // 浏览量 + 1
        $article->incrementAmount($id, 'visit_count');
        // 获取上一篇和下一篇
        $article_near = $article->getNear($id);
        return view('home.article',[
            'title' => $article->title,
            'article' => $article,
            'article_near' => $article_near,
            'tags' => $this->tags,
            'categories' => $this->categories,
            'friend_link' => $this->friend_link,
            'article_recommend' => $this->article_recommend,
        ]);

    }


}
