<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::select(['id', 'category_id', 'poster', 'title', 'visit_count', 'comment_count', 'created_at', 'updated_at'])->paginate(10);
        return view('admin.articles.list', compact('articles'));
    }
}
