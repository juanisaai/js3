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
            'name' => 'Br. Juan Isai Chuc Tuz',
            'username' => 'juanisai',
            'email' => 'juanisaai@hotmail.com',
            'contact' => '9876543210',
            'type' => 'Admin',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

    }
}

