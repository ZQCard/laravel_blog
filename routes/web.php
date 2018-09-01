<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth用户认证路由
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

/************************ 前台路由组 *****************************/
Route::group(['namespace' => 'Home', 'middleware' => 'web'], function($router){
    // 用户模块
    $router->get('/', 'IndexController@index')->name('home');
    // 文章详情
    $router->get('/article/{id}', 'ArticleController@show')->name('article');
    // 点赞
    $router->post('/article/{id}/praise', 'ArticleController@praise')->name('article.praise');
    // 评论
    $router->post('/article/{id}/comment', 'ArticleController@comment')->name('article.comment');
    // 分类下的文章列表
    $router->get('/category/{id}', 'CategoryController@index')->name('category');
    // 标签下的文章列表
    $router->get('/tag/{id}', 'TagController@index')->name('tag');
    // 搜索相关文章列表
    $router->get('/search', 'SearchController@index')->name('search');
});

/************************ 后台路由组 *****************************/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'web'], function($router){
    // 登陆前端页面
    $router->get('login', 'LoginController@index')->name('admin.login');
    // 登陆处理
    $router->post('login', 'LoginController@login');
    // 退出登陆
    $router->post('logout', 'LoginController@logout')->name('admin.logout');
    // 后台首页
    $router->get('/', 'BaseController@home')->name('admin.index');
    // 后台首页
    $router->get('index', 'BaseController@home')->name('admin.index');
    // 标签资源路由
    Route::resource('tag', 'TagController');
    // 分类资源路由
    Route::resource('category', 'CategoryController');
    // 友情链接资源路由
    Route::resource('friend_link', 'FriendLinkController');
    // 友情链接开启关闭
    Route::patch('friend_link', 'FriendLinkController@patch')->name('friend_link.patch');
    // 文章资源路由
    Route::resource('article', 'ArticleController');
    // 文章回复
    Route::post('article/restore', 'ArticleController@restore')->name('article.restore');
    // 关于我设置
    $router->match(['get', 'post'], 'person/about', 'PersonController@about')->name('person.about');
    // 管理员个人信息设置
    $router->match(['get', 'post'], 'person/info', 'PersonController@info')->name('person.info');
});

/*************************  公共路由  ****************************************/
Route::group(['namespace' => 'Common', 'middleware' => 'web'], function($router){
    // 文件上传
    $router->post('upload', 'UploaderController@upload')->name('upload');
});