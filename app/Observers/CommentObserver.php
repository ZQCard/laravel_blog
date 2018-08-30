<?php

namespace App\Observers;

use App\Jobs\SendReminderEmail;
use App\Models\ArticleComment;

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