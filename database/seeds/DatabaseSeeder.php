<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
        /*$this->call(UsersTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(DataEquipmentTableSeeder::class);
        $this->call(DataDeviceTableSeeder::class);
        $this->call(ServiceRequestTableSeeder::class);
        $this->call(EquipmentReceptionTableSeeder::class);
        $this->call(DataDictumTableSeeder::class);*/
    }
}
