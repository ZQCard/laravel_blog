<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Admin',1)->create([
            'username' => 'card',
            'email'    => config('mail.username'),
            'password' => bcrypt('123456'),
        ]);
    }
}
