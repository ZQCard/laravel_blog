<?php

namespace App\Http\Controllers\Home;

use App\Http\Requests\ArticleCommentRequest;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\ArticlePraise;
use App\Models\Traits\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    use JsonResponse;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth', ['only' => ['comment']]);
    }

    public function show($id)
    {
        $article = Article::findOrfail($id);
        $article->articleComment = $this->processComment($article->articleComment);
        // 浏览量 + 1
        $article->incrementAmount($id, 'visit_count');
        // 获取上一篇和下一篇
        $article_near = $article->getNear($id);
        return view('home.article',[
            'about' => $this->about,
            'title' => $article->title,
            'article' => $article,
            'article_near' => $article_near,
            'tags' => $this->tags,
            'categories' => $this->categories,
            'friend_link' => $this->friend_link,
            'article_recommend' => $this->article_recommend,
        ]);
    }

    public function praise($id, Request $request)
    {
        $article = Article::find($id);
        if (is_null($article)){
            return $this->fail("文章不存在");
        }
        $data = $request->all('user_id');
        // 先查找是否点赞过，以用户为主
        $exist = ArticlePraise::where('user_id', $data['user_id'])->orWhere('ip', ip2long($request->ip()))->exists();
        if ($exist){
            return $this->fail("您已经点赞过了");
        }

        // 插入记录
        $model = new ArticlePraise();
        $model->article_id = $id;
        $model->user_id = $data['user_id'] ? : 0;
        $model->ip = $request->ip();
        if($model->save()){
            // 增加文章赞数和分数
            $article->incrementAmount($id, 'praise_count');

            return $this->success("点赞成功");

        }
    }

    public function comment($id, ArticleCommentRequest $request)
    {
        $comment = new ArticleComment();
        $comment->fill($request->all());
        if ($comment->save()){
            // 增加评论数
            $article = Article::find($id);
            $article->incrementAmount($id, 'comment_count');
            return $this->success('评论成功');
        }
        return $this->fail('数据库保存失败');
    }

    /**
     * 处理评论
     * @param $comments
     * @return array
     */
    private function processComment($comments) {
        $tmp = [];
        foreach ($comments as $key => $comment){
            $tmp[$comment->id] = $comment;
        }

        foreach ($comments as $key => $comment){
            if ($comment->parent_id != 0){
                $tmp[$comment->id]->parent = $tmp[$comment->parent_id];
            }
        }
        return $tmp;
    }
}
