<?php

use App\Entities\DataEquipment;
use Illuminate\Database\Seeder;

class DataEquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DataEquipment::class)->times(60)->create();
    }
}
