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
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@foobar-lav.com',
            'contact' => null,
            'type' => 'Admin',
            'password' => bcrypt('secret'),
            'active' => '1'
        ]);

    }
}

