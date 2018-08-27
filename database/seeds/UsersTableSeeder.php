<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory('App\Models\User',1)->create([
            'name' => '卡牌',
            'email' => '445864742@qq.com',
            'password' => bcrypt('123456'),
            'avatar' => 'http://pe3ocoltz.bkt.clouddn.com/1746jpg'
        ]);
    }
}
