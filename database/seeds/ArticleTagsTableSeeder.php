<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Article;
use App\Models\ArticleTag;

class ArticleTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 所有分类 ID 数组，如：[1,2,3,4]
        $tag_ids = Tag::all()->pluck('id')->toArray();

        // 所有文章ID 数组
        $article_ids = Article::all()->pluck('id')->toArray();

        // 获取 Faker 实例
        $faker = app(Faker\Generator::class);

        $article_tags = factory(ArticleTag::class)
            ->times(20)
            ->make()
            ->each(function ($article_tag, $index)
            use ($tag_ids, $article_ids, $faker)
            {
                // 从分类ID 数组中随机取出一个并赋值
                $article_tag->tag_id = $faker->randomElement($tag_ids);
                $article_tag->article_id = $faker->randomElement($article_ids);
            });

        // 将数据集合转换为数组，并插入到数据库中
        ArticleTag::insert($article_tags->toArray());
    }
}
