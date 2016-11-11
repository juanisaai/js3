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
            'contact' => '9831245683',
            'type' => 'Technician',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Sergio Alvarez',
            'username' => 'sergioalvarez',
            'email' => 'sergio@hotmail.com',
            'contact' => '9831243412',
            'type' => 'Technician',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Bonna Collí',
            'username' => 'bonnacolli',
            'email' => 'bonnacolli@hotmail.com',
            'contact' => '9831245413',
            'type' => 'Collaborate',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'Marlene Castro',
            'username' => 'marlenecastro',
            'email' => 'marlenecastro@hotmail.com',
            'contact' => '9831248964',
            'type' => 'Collaborate',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

    }
}

