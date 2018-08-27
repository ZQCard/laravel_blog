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
// Authentication Routes...
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
    // 分类下的文章列表
    $router->get('/category/{id}', 'CategoryController@index')->name('category');
    // 标签下的文章列表
    $router->get('/tag/{id}', 'TagController@index')->name('tag');
});

/************************ 后台路由组 *****************************/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'web'], function($router){
    $router->get('login', 'LoginController@index')->name('admin.login');
    $router->post('login', 'LoginController@login');
    $router->post('logout', 'LoginController@logout')->name('admin.logout');
    $router->get('/', 'AdminController@home')->name('admin.index');
    $router->get('index', 'AdminController@home')->name('admin.index');
    Route::resource('tag', 'TagController');
    Route::resource('category', 'CategoryController');
    Route::resource('friend_link', 'FriendLinkController');
    Route::patch('friend_link', 'FriendLinkController@patch')->name('friend_link.patch');
    Route::resource('article', 'ArticleController');
    Route::post('article/restore', 'ArticleController@restore')->name('article.restore');
});

/*************************  公共路由  ****************************************/
Route::group(['namespace' => 'Common', 'middleware' => 'web'], function($router){
    $router->post('upload', 'UploaderController@upload')->name('upload');
});