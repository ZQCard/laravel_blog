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

/************************ 前台路由组 *****************************/
Route::group(['namespace' => 'Home', 'middleware' => 'web'], function($router){
    $router->get('/', 'IndexController@index')->name('home');
});

/************************ 后台路由组 *****************************/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'web'], function($router){
    $router->get('/login', 'LoginController@index')->name('admin.login');
    $router->post('/login', 'LoginController@login');
    $router->post('/logout', 'LoginController@logout')->name('admin.logout');
    $router->get('/', 'AdminController@index')->name('admin.index');
    $router->get('/index', 'AdminController@index')->name('admin.index');
    $router->get('/test', 'AdminController@test')->name('admin.test');
});
