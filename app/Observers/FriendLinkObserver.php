<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\ArticleTag;
use Illuminate\Support\Facades\Redis;

class FriendLinkObserver
{
    /**
     * 清除缓存
     */
    public function saved()
    {
        Redis::Del('common.friend_link');
    }
}