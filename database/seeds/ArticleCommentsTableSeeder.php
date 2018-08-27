<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\ArticleComment;
use App\Models\User;

class ArticleCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 所有文章 ID 数组，如：[1,2,3,4]
        $article_ids = Article::where('id', '>', 15)->get()->pluck('id')->toArray();

        // 所有用户ID数组
        $user_ids = User::all()->pluck('id')->toArray();
        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $article_comments = factory(ArticleComment::class)
            ->times(50)
            ->make()
            ->each(function ($comment, $index)
            use ($article_ids, $user_ids, $faker)
            {
                // 从分类ID 数组中随机取出一个并赋值
                $comment->article_id = $faker->randomElement($article_ids);
                $comment->user_id = $faker->randomElement($user_ids);
                $comment->parent_id = $faker->numberBetween(0,3);
            });

        // 将数据集合转换为数组，并插入到数据库中
        ArticleComment::insert($article_comments->toArray());
    }
}
