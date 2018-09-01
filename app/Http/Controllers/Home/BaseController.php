<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use App\Models\FriendLink;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    // 当前页面title
    protected $title = '首页';
    // 分页数量
    protected $pageSize = 10;

    // 公共加载数据
    protected $tags = null;
    protected $categories = null;
    protected $friend_link = null;
    protected $article_recommend = null;
    protected $about = [
        'user' => '暂无',
        'avatar' => '',
        'content' => '暂无介绍',
    ];

    public function __construct()
    {
        // 使用redis缓存
        $redis = app('redis.connection');
        if (!$redis->exists('common.categories')){
            $categories = Category::orderBy('sort', 'desc')->get(['id', 'name']);
            $redis->set('common.categories', json_encode($categories));
            $this->categories = $categories;
        } else {
            $this->categories = json_decode($redis->get('common.categories'));
        }


        // 查询标签信息
        if (!$redis->exists('common.tags')){
            $tags = Tag::all(['id', 'name', 'count']);
            $redis->set('common.tags', json_encode($tags));
            $this->tags = $tags;
        } else {
            $this->tags = json_decode($redis->get('common.tags'));
        }

        // 查询友情链接
        if (!$redis->exists('common.friend_link')){
            $friend_link = FriendLink::where('is_show', 1)->get(['name', 'link']);
            $redis->set('common.friend_link', json_encode($friend_link));
            $this->friend_link = $friend_link;
        } else {
            $this->friend_link = json_decode($redis->get('common.friend_link'));
        }

        // 查询推荐文章 缓存时间为24小时
        if (!$redis->exists('common.articles')){
            $articles = Article::orderBy('score','desc')->limit(5)->get(['id', 'title']);
            $redis->set('common.articles', json_encode($articles));
            $redis->expire('common.articles', 86400);
            $this->article_recommend = $articles;
        } else {
            $this->article_recommend = json_decode($redis->get('common.articles'));
        }

        // 获取关于我
        if ($redis->exists('person.about')){
            $this->about =json_decode($redis->get('person.about'), true);
        }
    }
}
