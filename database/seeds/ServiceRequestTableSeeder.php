<?php

use App\Entities\ServiceRequest;
use Illuminate\Database\Seeder;

class ServiceRequestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ServiceRequest::class)->times(7)->create();
    }
}
