<?php

use App\Entities\LowInventoryDev;
use Illuminate\Database\Seeder;

class LowInventoryDevTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LowInventoryDev::class)->times(7)->create();
    }
}
