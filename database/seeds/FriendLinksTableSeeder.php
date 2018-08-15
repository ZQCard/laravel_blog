<?php

use Illuminate\Database\Seeder;

class FriendLinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => '卡牌小哥哥',
                'link' => 'http://www.niu12.com',
                'is_show' => 1
            ],
            [
                'name' => '起风小哥哥',
                'link' => 'https://www.achais.com',
                'is_show' => 1
            ],
            [
                'name' => '白俊遥',
                'link' => 'https://baijunyao.com',
                'is_show' => 0
            ]
        ];
        for ($i = 0; $i < count($data); $i++){
            factory('App\Models\FriendLink',1)->create([
                'name' => $data[$i]['name'],
                'link' => $data[$i]['link'],
                'is_show' => $data[$i]['is_show'],
            ]);
        }

    }
}
