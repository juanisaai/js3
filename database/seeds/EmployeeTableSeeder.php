<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('employees')->insert([
                    'ProfileEmployee' => 'Lic.',
                    'FirstName' => 'Alina Marisol',
                    'SecondName' => 'Chuc Tuz',
                    'RoleEmployee' => 'Jefa',
                    'area_id' => '1'
                ]);

                DB::table('employees')->insert([
                    'ProfileEmployee' => 'C.',
                    'FirstName' => 'María Reyna',
                    'SecondName' => 'Cach Chuc',
                    'RoleEmployee' => 'Jefa',
                    'area_id' => '2'
                ]);

               DB::table('employees')->insert([
                    'ProfileEmployee' => 'Lic.',
                    'FirstName' => 'Bonna Gisella',
                    'SecondName' => 'Collí Collí',
                    'RoleEmployee' => 'Jefa',
                    'area_id' => '3'
                ]);

                DB::table('employees')->insert([
                    'ProfileEmployee' => 'Ing.',
                    'FirstName' => 'Harvey de Jesús',
                    'SecondName' => 'León Uc',
                    'RoleEmployee' => 'Jefe',
                    'area_id' => '4'
                ]);

                DB::table('employees')->insert([
                    'ProfileEmployee' => 'Dr.',
                    'FirstName' => 'Luis Ángel',
                    'SecondName' => 'Blanco Márquez',
                    'RoleEmployee' => 'Jefe',
                    'area_id' => '5'
                ]);

                DB::table('employees')->insert([
                    'ProfileEmployee' => 'Lic.',
                    'FirstName' => 'Nubia Yanet',
                    'SecondName' => 'García Angulo',
                    'RoleEmployee' => 'Jefa',
                    'area_id' => '6'
                ]);



    }
}
