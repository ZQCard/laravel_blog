<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $fillable = ['category_id', 'title', 'content', 'poster'];

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
}
