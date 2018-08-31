<?php

namespace App\Http\Controllers\Home;

use App\Models\ArticleTag;
use App\Models\Tag;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TagController extends BaseController
{
    public function index($id)
    {
        // 获取标签名称
        $tag = Tag::FindOrFail($id);

        // 根据标签文章关联表进行分页
        $article_tags = ArticleTag::where('tag_id', $id)->paginate($this->pageSize);
        return view('home.tag',[
            'about' => $this->about,
            'title' => $tag->name,
            'article_tags' => $article_tags,
            'tags' => $this->tags,
            'categories' => $this->categories,
            'friend_link' => $this->friend_link,
            'article_recommend' => $this->article_recommend,
        ]);
    }
}
