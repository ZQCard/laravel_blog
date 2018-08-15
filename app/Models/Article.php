<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['category_id', 'title', 'content', 'keywords', 'page_visit', 'excerpt'];
}
