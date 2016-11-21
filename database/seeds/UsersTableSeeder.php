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
        DB::table('users')->insert([
            'name' => 'ISC. Harvey de Jesús León Uc',
            'username' => 'harveyuc',
            'email' => 'harveyuc@hotmail.com',
            'contact' => '9831245683',
            'type' => 'Technician',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Br. Sergio Alvarez Jimenez',
            'username' => 'sergioalvarez',
            'email' => 'sergio@hotmail.com',
            'contact' => '9831243412',
            'type' => 'Collaborate',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

    }
}

