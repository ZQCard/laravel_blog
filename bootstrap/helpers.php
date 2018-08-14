<?php
/**
 * Created by PhpStorm.
 * User: zhouq
 * Date: 2018/8/14
 * Time: 15:06
 */

function getRouteAction(){
    $currentRoute = \Request::getRequestUri();
    $routeArr = explode('/',$currentRoute);
    $length = count($routeArr);
    $lastWords = $routeArr[$length -1];
    if ($lastWords == 'create'){ // 新增数据
        return [
            'route' => route($routeArr[$length - 2].".store"),
            'keyword' => '新增',
            'buttonId' => 'formSubmitAdd'
        ];

    } elseif ($lastWords == 'edit'){ // 编辑数据
        return [
            'route' => route($routeArr[$length - 3].".update", $routeArr[$length - 2]),
            'keyword' => '编辑',
            'buttonId' => 'formSubmitEdit'
        ];
    }
}