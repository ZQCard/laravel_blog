<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use SoftDeletes;

    private $score = [
        // 浏览增加分值
        'visit_count' => 12 * 60 * 60,
        // 点赞增加分值
        'praise_count' => 24 * 60 * 60,
        // 浏览增加分值
        'comment_count' => 48 * 60 * 60,
    ];

    protected $table = 'articles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $fillable = ['category_id', 'title', 'content', 'poster', 'author', 'tips'];

    private $select = ['id', 'category_id', 'score', 'poster', 'title', 'visit_count', 'comment_count', 'created_at', 'updated_at', 'deleted_at'];

    private $fieldOrder = ['id', 'visit_count', 'comment_count', 'score'];

    private $orderType = ['desc', 'asc'];


    /**
     * 根据条件排序
     * @param $query
     * @param $field string 字段名
     * @param $order  string 排序方式
     * @return mixed
     */
    public function scopeWithOrder($query, $field, $order)
    {
        // 非法参数,按照默认值排序
        (!in_array($field, $this->fieldOrder)) && $field = $this->primaryKey;
        (!in_array($order, $this->orderType)) && $order = 'desc';
        return $query->with('category')->select($this->select)->orderBy($field, $order);
    }

    /**
     *  获得与文章关联的分类记录
     */
    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * 文章与标签表与中间表三张表关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Tag()
    {
        return $this->belongsToMany('App\Models\Tag', 'article_tags')->select(['tag_id', 'name']);
    }

    /**
     * 获取标签id集合
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ArticleTag()
    {
        return $this->hasMany('App\Models\ArticleTag')->select(['tag_id']);
    }

    /**
     * 文章与评论关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ArticleComment()
    {
        return $this->hasMany('App\Models\ArticleComment');
    }

    /**
     * 根据主键增加统计数据 并增加分值
     * @param $primaryKey
     * @param $column
     * @param int $amount
     */
    public function incrementAmount($primaryKey, $column, $amount = 1)
    {
        DB::table($this->table)->where($this->primaryKey, $primaryKey)->increment($column, $amount, ['score' => DB::raw("`score` + ".$this->score[$column])]);
    }

    /**
     * 获取上一篇和下一篇文章
     * @param $id
     * @return array
     */
    public function getNear($id)
    {
        $article_near = [];
        $article_near['previous'] = self::where('id', '<', $id)->first();
        $article_near['next'] = self::where('id', '>', $id)->first();
        return $article_near;
    }
}
