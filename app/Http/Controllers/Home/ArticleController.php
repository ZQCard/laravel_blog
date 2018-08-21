<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;

class ArticleController extends BaseController
{
    public function show($id)
    {
        $article = Article::findOrFail($id);
        dd($article);
    }
}
