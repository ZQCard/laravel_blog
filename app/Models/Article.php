<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['category_id', 'title', 'content', 'poster'];

    /**
     *  获得与文章关联的分类记录
     */

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
