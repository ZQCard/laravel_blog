<?php
use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {

    $sentence = $faker->sentence(1, 50);

    // 随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();
    // 传参为生成最大时间不超过，创建时间永远比更改时间要早
    $created_at = $faker->dateTimeThisMonth($updated_at);

    return [
        'title' => $sentence,
        'keywords' => $faker->company,
        'content' => $faker->text(),
        'page_visit' => $faker->randomNumber(),
        'excerpt' => $sentence,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});