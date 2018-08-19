<?php
use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {

    $sentence = $faker->sentence(1, 50);

    // 随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();
    // 传参为生成最大时间不超过，创建时间永远比更改时间要早
    $created_at = $faker->dateTimeThisMonth($updated_at);

    // 文章海报图片地址
    $avatars = [
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
        'https://fsdhubcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
    ];

    return [
        'poster' => $faker->randomElement($avatars),
        'title' => $sentence,
        'keywords' => $faker->company,
        'content' => $faker->text(),
        'visit_count' => $faker->randomNumber(),
        'comment_count' => $faker->randomNumber(),
        'score' => $faker->randomNumber(),
        'excerpt' => $sentence,
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});