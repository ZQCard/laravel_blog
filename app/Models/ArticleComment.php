<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleComment extends Model
{
    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }
}
