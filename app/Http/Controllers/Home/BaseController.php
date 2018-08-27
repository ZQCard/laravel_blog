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

    public function __construct()
    {
        // 查询分类信息
        $this->categories = Category::orderBy('id', 'asc')->get(['id', 'name']);

        // 查询标签信息
        $this->tags = Tag::all(['id', 'name', 'count']);

        // 查询友情链接
        $this->friend_link = FriendLink::where('is_show', 1)->get(['name', 'link']);

        // 查询推荐文章
        $this->article_recommend = Article::orderBy('score','desc')->limit(5)->get(['id', 'title']);
    }
}