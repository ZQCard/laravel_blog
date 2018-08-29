<?php

namespace App\Observers;

use App\Handlers\Email;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\ArticleTag;
use App\Models\User;

class CommentObserver
{
    /**
     * 后置方法
     * @param ArticleComment $comment
     */
    public function saved(ArticleComment $comment)
    {
        // 文章信息
        $article['title'] = $comment->article->title;
        $article['id'] = $comment->article->id;

        // 当前评论用户
        $current_data['user'] = $comment->user->name;
        $current_data['comment'] = $comment->content;
        // 通知管理员
        Email::commentToAdmin($article, $current_data);

        if ($comment->parent_id != 0){
            // 之前评论用户
            $original = ArticleComment::find($comment->parent_id);
            $original_data['user'] = $original->user->name;
            $original_data['comment'] = $original->content;
            $original_data['email'] = $original->user->email;
            // 通知原评用户
            Email::commentToUser($article, $current_data, $original_data);
        }
    }


}