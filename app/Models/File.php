<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * 根据文件散列码查找文件
     * @param $hash_key
     * @return mixed
     */
    public static function findByKey($hash_key)
    {
        return self::where('hash_key', $hash_key)->first();
    }
}
