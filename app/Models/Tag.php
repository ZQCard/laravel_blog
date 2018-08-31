<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'count'
    ];

    public function scopeWithOrder($query,  $order)
    {
        switch ($order){
            case 'count':
                $query->useDesc();
                break;
            default:
                $query->idDesc();
        }
        return $query;
    }

    public function scopeUseDesc($query)
    {
        return $query->orderBy('count', 'desc');
    }

    public function scopeIdDesc($query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function Article()
    {
        return $this->belongsToMany('App\Models\Article', 'article_tags');
    }
}
