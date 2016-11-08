<?php

use App\Entities\LowInventoryEq;
use Illuminate\Database\Seeder;

class LowInventoryEqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LowInventoryEq::class)->times(7)->create();

    }
}
