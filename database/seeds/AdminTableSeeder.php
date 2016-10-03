<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Juan Isai Chuc Tuz',
            'username' => 'juanisai',
            'email' => 'juanisaai@hotmail.com',
            'type' => 'Admin',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

    }
}

