<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Carbon本地化
        Carbon::setLocale('zh');
        // 加入文章观察器
        \App\Models\Article::observe(\App\Observers\ArticleObserver::class);
        // 加入评论观察期
        \App\Models\ArticleComment::observe(\App\Observers\CommentObserver::class);
        // 加入标签观察期
        \App\Models\Tag::observe(\App\Observers\TagObserver::class);
        // 加入分类观察期
        \App\Models\Category::observe(\App\Observers\CategoryObserver::class);
        // 加入友情链接观察期
        \App\Models\FriendLink::observe(\App\Observers\FriendLinkObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
