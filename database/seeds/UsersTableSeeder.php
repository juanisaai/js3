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
            'name' => 'Harvey de Jesús León Uc',
            'username' => 'harveyuc',
            'email' => 'harveyuc@hotmail.com',
            'contact' => '1',
            'type' => 'Technician',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Sergio Alvarez',
            'username' => 'sergioalvarez',
            'email' => 'sergio@hotmail.com',
            'contact' => '2',
            'type' => 'Technician',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Bonna Collí',
            'username' => 'bonnacolli',
            'email' => 'bonnacolli@hotmail.com',
            'contact' => '3',
            'type' => 'Collaborate',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Marlene Castro',
            'username' => 'marlenecastro',
            'email' => 'marlenecastro@hotmail.com',
            'contact' => '4',
            'type' => 'Collaborate',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

    }
}

