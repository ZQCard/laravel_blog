<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    protected $fillable = ['parent_id', 'article_id', 'user_id', 'content'];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Article()
    {
        return $this->belongsTo('App\Models\Article');
    }
}
