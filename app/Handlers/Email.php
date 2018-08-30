<?php

namespace App\Handlers;

use Illuminate\Support\Facades\Mail;

class Email
{
    static $type = [
        'admin' => [
            'comment' => '评论通知',
        ],
        'user' => [
            'reply' => '评论回复'
        ]
    ];

    public static function commentToAdmin($article, $current_data)
    {
        Mail::send('email.notify', ['title' => $article['title'], 'id' => $article['id'], 'user' => $current_data['user'], 'comment' => $current_data['comment']], function ($message){
            $message->to(config('mail.username'), self::$type['admin']['comment'])->subject(self::$type['admin']['comment']);
        });
    }

    public static function commentToUser($article, $current_data, $original_data)
    {
        Mail::send('email.comment', ['article' => $article, 'current_data' => $current_data, 'original_data' => $original_data], function ($message) use ($original_data){
            $message->to($original_data['email'], self::$type['user']['reply'])->subject(self::$type['user']['reply']);
        });
    }
}