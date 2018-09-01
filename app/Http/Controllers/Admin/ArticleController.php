<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    public function index(Request $request, Article $article)
    {
        $articles = $article->withTrashed()->withOrder($request->field, $request->order)->paginate(10);
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
        $data = $request->all();

        $article->fill($data);

        // 处理标签
        $this->processTag($data);

        // 保存文章
        if ($article->save()){
            return $this->success('创建文章成功', route('article.index'));
        }
        return $this->fail('数据库保存失败');
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('categories', 'article'));
    }

    public function destroy(Article $article)
    {
        $article->delete();
        if ($article->trashed()){
            return $this->success('删除文章成功', route('article.index'));
        }
        return $this->fail('数据库保存失败');
    }

    public function restore(Request $request)
    {
        if (Article::withTrashed()->where('id', $request->get('id'))->restore()){
            return $this->success('恢复文章成功', route('article.index'));
        }
        return $this->fail('数据库保存失败');
    }

    public function edit(Article $article)
    {
        // 取出所有分类
        $categories = Category::all(['id', 'name']);
        $tags = Tag::all(['id', 'name']);
        //取出文章下的标签
        $tag_has_ids = [];
        foreach ($article->articletag->toArray() as $tag){
            $tag_has_ids[] = $tag['tag_id'];
        }
        return view('admin.articles.create_and_edit', compact('article', 'categories', 'tags', 'tag_has_ids'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $data = $request->all();
        $article->fill($request->all());

        // 处理标签
        $this->processTag($data);

        // 保存文章
        if ($article->save()) {
            return $this->success('修改文章成功', route('article.index'));
        }
        return $this->fail('数据库保存失败');
    }
    /**
     * 将标签信息存储在session中,便于前置后置方法处理
     * @param $data
     */
    private function processTag($data){
        // 把标签信息存如session，在文章观察器中拉取
        session()->flash('article.keywords', $data['other_tags']);
        // 将标签取出来after save处理
        $tags_data['tag_ids'] = isset($data['tag_ids']) ? $data['tag_ids'] : [];
        $tags_data['other_tags'] = $data['other_tags'];
        session()->flash('article.tags', $data);
    }
}
