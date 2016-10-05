<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('areas')->insert([
            'NameArea' => 'Recursos Humanos',
            'UnitArea' => 'Jurisdicción Sanitaria 3',
            'ExtensionArea' => 'Felipe Carrillo Puerto',
            'DirectorateArea' => 'Dirección General',
        ]);

        DB::table('areas')->insert([
            'NameArea' => 'Recursos Financieros',
            'UnitArea' => 'Jurisdicción Sanitaria 3',
            'ExtensionArea' => 'Felipe Carrillo Puerto',
            'DirectorateArea' => 'Dirección General',
        ]);

        DB::table('areas')->insert([
            'NameArea' => 'Recursos Materiales',
            'UnitArea' => 'Jurisdicción Sanitaria 3',
            'ExtensionArea' => 'Felipe Carrillo Puerto',
            'DirectorateArea' => 'Dirección General',
        ]);

        DB::table('areas')->insert([
            'NameArea' => 'Departamento de Informática',
            'UnitArea' => 'Jurisdicción Sanitaria 3',
            'ExtensionArea' => 'Felipe Carrillo Puerto',
            'DirectorateArea' => 'Dirección General',
        ]);

        DB::table('areas')->insert([
            'NameArea' => 'Jefatura Jurisdiccional',
            'UnitArea' => 'Jurisdicción Sanitaria 3',
            'ExtensionArea' => 'Felipe Carrillo Puerto',
            'DirectorateArea' => 'Dirección General',
        ]);

        DB::table('areas')->insert([
            'NameArea' => 'Administración Jurisdiccional',
            'UnitArea' => 'Jurisdicción Sanitaria 3',
            'ExtensionArea' => 'Felipe Carrillo Puerto',
            'DirectorateArea' => 'Dirección General',
        ]);

    }
}
