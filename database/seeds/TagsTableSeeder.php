<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Linux', 'PHP', 'MySQL', 'Nginx', 'Golang', '设计模式'];
        for($i = 0; $i < 6; $i++){
            factory('App\Models\Tag',1)->create([
                'name' => $data[$i],
            ]);
        }

    }
}
