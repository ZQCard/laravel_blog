<?php

namespace App\Observers;

use App\Models\Article;

class ArticleObserver
{
    public function saving(Article $article)
    {
        $article->score = time();
        $article->keywords = config("personal.keywords").','.session('article.keywords');
        $article->excerpt = make_excerpt($article->content);
    }
}