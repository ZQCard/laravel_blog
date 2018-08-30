<?php

namespace App\Jobs;

use App\Models\ArticleComment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Handlers\Email;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $comment;

    /**
     * SendReminderEmail constructor.
     * @param ArticleComment $comment
     */
    public function __construct(ArticleComment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // 文章信息
        $article['title'] = $this->comment->article->title;
        $article['id'] = $this->comment->article->id;

        // 当前评论用户
        $current_data['user'] = $this->comment->user->name;
        $current_data['comment'] = $this->comment->content;
        // 通知管理员
        Email::commentToAdmin($article, $current_data);

        if ($this->comment->parent_id != 0){
            // 之前评论用户
            $original = ArticleComment::find($this->comment->parent_id);
            $original_data['user'] = $original->user->name;
            $original_data['comment'] = $original->content;
            $original_data['email'] = $original->user->email;
            // 通知原评用户
            Email::commentToUser($article, $current_data, $original_data);
        }
    }
}
