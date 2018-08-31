<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends BaseController
{
    public function index($id)
    {
        // 获取当前分类名称
        $category = Category::findOrFail($id);

        $articles = Article::where('category_id', $id)->orderBy('id','desc')->select(['id', 'title', 'poster', 'excerpt'])->paginate($this->pageSize);

        return view('home.category',[
            'about' => $this->about,
            'title' => $category->name,
            'articles' => $articles,
            'tags' => $this->tags,
            'categories' => $this->categories,
            'friend_link' => $this->friend_link,
            'article_recommend' => $this->article_recommend,
        ]);
    }
}
