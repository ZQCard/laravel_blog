<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 生成用户数据
        $this->call(UsersTableSeeder::class);
        // 生成管理员数据
        $this->call(AdminsTableSeeder::class);
         // 生成标签数据
        $this->call(TagsTableSeeder::class);
        // 生成分类标签
        $this->call(CategoriesTableSeeder::class);
        // 生成友情链接
        $this->call(FriendLinksTableSeeder::class);
        // 生成文章
        $this->call(ArticleTableSeeder::class);
        // 生成文章标签关联
        $this->call(ArticleTagsTableSeeder::class);
        // 生成评论数据
        $this->call(ArticleCommentsTableSeeder::class);
    }
}
