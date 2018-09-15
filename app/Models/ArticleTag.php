<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ArticleTag extends Model
{

    public function Article()
    {
        return $this->hasOne('App\Models\Article', 'id', 'article_id')->select(['id', 'poster', 'title', 'excerpt']);
    }

    /**
     * 建立标签与文章的关联
     * @param $tags_data
     * @param $article_id
     */
    public function articleRelateTag($tags_data, $article_id)
    {
        $tags_ids = $this->processTag($tags_data);
        $old_relation = ArticleTag::where('article_id', $article_id)->whereIn('tag_id', $tags_ids)->pluck('tag_id')->toArray();
        $new_relation = array_diff($tags_ids, $old_relation);
        $insert_data = [];
        foreach ($new_relation as $tag_id){
            $insert_data[] = ['article_id' => $article_id, 'tag_id' => $tag_id];
        }
        DB::table('article_tags')->insert($insert_data);

        // 更新标签使用数量
        $count_tag_use_ids = DB::table('article_tags')->distinct()->pluck('tag_id');
        foreach ($count_tag_use_ids as $id){
            $count = DB::table('article_tags')->where('tag_id', $id)->count();
             DB::table('tags')->where('id', $id)->update(['count' => $count]);
        }
    }

    /**
     * 取到新关联的标签
     * @param $tags_data
     * @return array
     */
    private function processTag($tags_data){
        // 标签id集合
        $new_tag_ids = isset($tags_data['tag_ids']) ? $tags_data['tag_ids'] : [];
        // 新标签数组
        $new_tags = explodeIgnoreComma($tags_data['other_tags']);
        // 数据库中已有的标签
        $old_tags = Tag::whereIn('name', $new_tags)->pluck('name')->toArray();
        // 需要插入数据库的标签
        $new_tags = array_diff($new_tags, $old_tags);
        // 循环插入获取新增id，添加到id集合中
        foreach ($new_tags as $tag){
            $tagModel = Tag::create(['name' => $tag]);
            $new_tag_ids[] = $tagModel->id;
        }
        return $new_tag_ids;
    }
}
