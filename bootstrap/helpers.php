<?php
/**
 * Created by PhpStorm.
 * User: zhouq
 * Date: 2018/8/14
 * Time: 15:06
 */

/**
 *  根据路由获取当前行为是编辑或者新增,并且根据资源路由返回需要提交数据的路由
 * @return array
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


/**
 * 忽略中文都号和中文逗号的区别,使用explode
 * @param $string
 * @return array
 */
function explodeIgnoreComma($string){

    $returnArr = [];

    $array_original = explode(',', $string);

    foreach ($array_original as $value){

        if (strpos($value, '，') !== false) {
            $array_cn_comma = explode('，', $value);
            $returnArr = array_merge($returnArr, $array_cn_comma);
            continue;
        }

        $returnArr[] = $value;
    }

    // 取出空字符串并返回
    return array_filter($returnArr);
}

/**
 * 截取文本
 * @param $value
 * @param int $length
 * @return string
 */
function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str_limit($excerpt, $length);
}

/**
 * 生成随机数,前置补0
 * @param int $min
 * @param int $max
 * @return int|string
 */
function seedRandWithZero($min = 0, $max = 2000){
    $num = rand($min, $max);
    $len = strlen($max) - strlen($num);
    for ($i = 0; $i < $len; $i++){
        $num = '0'.$num;
    }
    return $num;
}