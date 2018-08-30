<?php

namespace App\Observers;

use App\Handlers\Email;
use App\Jobs\SendReminderEmail;
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
        dispatch(new SendReminderEmail($comment));
    }


}