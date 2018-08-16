<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::select(['id', 'category_id', 'poster', 'title', 'visit_count', 'comment_count', 'created_at', 'updated_at'])->paginate(10);
        return view('admin.articles.list', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all(['id', 'name']);
        $tags = Tag::all(['id', 'name']);
        return view('admin.articles.create_and_edit', compact('categories', 'tags'));
    }

    public function store(ArticleRequest $request, Article $article)
    {
        dd($request->all());
    }
}
