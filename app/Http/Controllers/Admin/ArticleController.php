<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends AdminController
{
    public function index(Request $request, Article $article)
    {
        $articles = $article->withOrder($request->field, $request->order)->paginate(10);
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
        $request_data = $request->all();
        $article->fill($request->all());
        // 把标签信息存如session，在文章观察器中拉取
        $request->session()->put('article.keywords', $request_data['other_tags']);
        // 保存文章
        if ($article->save()){
            // 将标签取出来另外处理
            $tags_data['tag_ids'] = $request_data['tag_ids'];
            $tags_data['other_tags'] = $request_data['other_tags'];
            (new ArticleTag)->articleRelateTag($tags_data, $article->id);
            return $this->success('创建文章成功', route('article.index'));
        }
        return $this->fail('数据库保存失败');
    }
}
