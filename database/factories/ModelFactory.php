<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(\App\Entities\Employee::class, function (Faker\Generator $faker) {
    return [

        'ProfileEmployee' => $faker->title($gender = null|'male'|'female'),
        'FirstName' => $faker->firstName($gender = null|'male'|'female'),
        'SecondName' => $faker->lastName,
        'RoleEmployee' => $faker->randomElement($array = array ('Jefe','Jefa','Ayudante')),
        'area_id' => rand(1,6)

    ];
});

$factory->define(\App\Entities\DataEquipment::class, function (Faker\Generator $faker) {
    return [
        'InventoryNumberEquipment' => $faker->ean8,
        'NomenclatureEquipment' => 'JS3-PC-'.$faker->numberBetween($min = 1, $max = 10),
        'DescriptionEquipment' => 'Unidad Central de Procesamiento',
        'BrandEquipment' => $faker->randomElement($array = array ('Sony','HP','Acer','Toshiba')),
        'ModelEquipment' => $faker->isbn10,
        'SerialNumberEquipment' => $faker->isbn13,
        'ColorEquipment' => $faker->safeColorName,
        'DescriptionAdEquipment' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'TypeEquipment' => $faker->randomElement($array = array ('Laptop','Desktop')),
        'TypeAssemblyEquipment' => $faker->randomElement($array = array ('Ensamblada','Fábrica')),
        'EquipmentOS' => $faker->randomElement($array = array ('Windows 7','Windows XP', 'Windows 8', 'Windows 10')),
        'ArchitectureOS' => $faker->randomElement($array = array ('x86','x64')),
        'DistributionOS' => $faker->randomElement($array = array ('Pro','Ultimate','HomeBasic','Enterprise')),
        'SerialNumberOS' => $faker->ean8,
        'InventoryNumberOS' => $faker->ean8,
        'IPAddressEquipment' => $faker->ipv4,
        'BrandMotherB' => $faker->randomElement($array = array ('Gigabyte','Asus')),
        'ModelMotherB' => $faker->isbn10,
        'SerialNumberMotherB' => $faker->isbn13,
        'BrandCPU' => $faker->randomElement($array = array ('Intel','AMD')),
        'ModelCPU' => $faker->isbn10,
        'FrequencyCPU' => $faker->numberBetween($min = 1, $max = 10).'.'.$faker->numberBetween($min = 1, $max = 10).' Ghz',
        'BrandRam' => $faker->randomElement($array = array ('ADATA','Kingston')),
        'TypeRam' => $faker->randomElement($array = array ('DDR3','DDR2')),
        'CapabilityRam' => $faker->randomDigit.' GB',
        'TypeHHD' => $faker->randomElement($array = array ('SATA II','IDE')),
        'BrandHHD' => $faker->randomElement($array = array ('Saegate','ADATA')),
        'ModelHHD' => $faker->isbn10,
        'CapabilityHHD' => $faker->randomDigit.' GB',
        'SerialNumberHHD' => $faker->isbn13,
        'BrandDiscReader' => $faker->randomElement($array = array ('Sony','LG','Samsung')),
        'TypeDiscReader' => $faker->randomElement($array = array ('SATA II','IDE')),
        'active' => true,
        'employee_id' => rand(1,10),
    ];
});

$factory->define(\App\Entities\DataDevice::class, function (Faker\Generator $faker) {
    return [
        'InventoryNumberDevice' => $faker->ean8,
        'NomenclatureDevice' => 'JS3-DEV-'.$faker->numberBetween($min = 1, $max = 10),
        'DescriptionDevice' => $faker->randomElement($array = array ('Impresora','Red')),
        'TypeDevice' => $faker->randomElement($array = array ('Laserjet','Deskjet','Antena de red')),
        'BrandDevice' => $faker->randomElement($array = array ('TP-Link','HP')),
        'ModelDevice' => $faker->isbn10,
        'SerialNumberDevice' => $faker->isbn13,
        'ColorDevice' => $faker->safeColorName,
        'DescriptionAdDevice' => $faker->realText($maxNbChars = 20, $indexSize = 2),
        'active' => true,
        'employee_id' => rand(1,10),

    ];
});

$factory->define(\App\Entities\ServiceRequest::class, function (Faker\Generator $faker) {
    return [

        'ReasonRequests' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'receptionist' => $faker->name,
        'TechnicianAssigned' => 'ISC. Harvey J. León Uc',
        'DescriptionService' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'employee_id' => rand(1,10),

    ];
});

$factory->define(\App\Entities\EquipmentReception::class, function (Faker\Generator $faker) {
    return [

        'TypeTrouble' => $faker->randomElement($array = array ('Hardware','Software')),
        'ReasonReception' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'ObservationReception' => $faker->realText($maxNbChars = 20, $indexSize = 2),
        'AccessoryAdd' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'Receptionist' => 'ISC. Harvey J. León Uc',
        'Petitioner' => $faker->name,
        'Receive' => $faker->name,
        'StatusEquipment' => $faker->randomElement($array = array ('Ready','GenerateDictum')),
        'NumberDictum' => $faker->ean8,
        'NumberDoc' => $faker->ean13,
        'equipment_id' => rand(1,10),
        'user_id' => rand(1,2),

    ];
});

$factory->define(\App\Entities\DataDictum::class, function (Faker\Generator $faker) {
    return [
        'Problematic' => $faker->realText($maxNbChars = 500, $indexSize = 2),
        'Dictum' => $faker->realText($maxNbChars = 500, $indexSize = 4),
        'Recommendation' => $faker->realText($maxNbChars = 300, $indexSize = 4),
        'observations' => $faker->realText($maxNbChars = 300, $indexSize = 4),
        'device_id' => rand(1,10),
        'equipment_id' => rand(1,10),
        'user_id' => rand(1,2),
    ];
});
