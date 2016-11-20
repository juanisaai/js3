<?php

use Illuminate\Database\Seeder;

class DataDictumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\DataDictum::class)->times(30)->create();
    }
}
