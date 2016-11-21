<?php

use Illuminate\Database\Seeder;

class EquipmentReceptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entities\EquipmentReception::class)->times(10)->create();
    }
}
