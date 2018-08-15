<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FriendLink extends Model
{
    protected $fillable = [
        'name', 'link', 'is_show'
    ];
}
