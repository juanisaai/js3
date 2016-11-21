<?php

use App\Entities\DataDevice;
use Illuminate\Database\Seeder;

class DataDeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(DataDevice::class)->times(10)->create();
    }
}
