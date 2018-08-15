<?php
use Illuminate\Database\Seeder;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['PHP', '前端', 'LINUX', '其他', '胡言乱语'];
        foreach ($data as $value){
            factory('App\Models\Category',1)->create([
                'name' => $value,
            ]);
        }
    }
}