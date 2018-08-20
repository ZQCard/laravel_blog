<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\ArticleTag;

class ArticleObserver
{
    /**
     * 前置方法 before insert|before update
     * @param Article $article
     */
    public function saving(Article $article)
    {
        $article->score = time();
        $article->keywords = config("personal.keywords").','.session('article.keywords');
        $article->excerpt = make_excerpt($article->content);
    }

    /**
     * 后置方法 after insert|after update
     * @param Article $article
     */
    public function saved(Article $article)
    {
        (new ArticleTag)->articleRelateTag(session('article.tags'), $article->id);
    }
}