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
        'NomenclatureEquipment' => 'JS3-PC-'.$faker->randomDigit,
        'DescriptionEquipment' => $faker->realText($maxNbChars = 20, $indexSize = 2),
        'BrandEquipment' => $faker->word,
        'ModelEquipment' => $faker->isbn10,
        'SerialNumberEquipment' => $faker->isbn13,
        'ColorEquipment' => $faker->safeColorName,
        'DescriptionAdEquipment' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'TypeEquipment' => $faker->word,
        'TypeAssemblyEquipment' => $faker->word,
        'OSEquipment' => $faker->word,
        'IPAddressEquipment' => $faker->ipv4,
        'BrandMotherB' => $faker->company,
        'ModelMotherB' => $faker->isbn10,
        'SerialNumberMotherB' => $faker->isbn13,
        'BrandCPU' => $faker->company,
        'ModelCPU' => $faker->isbn10,
        'FrequencyCPU' => $faker->isbn13,
        'BrandRam' => $faker->company,
        'TypeRam' => $faker->word,
        'CapabilityRam' => $faker->randomDigit,
        'TypeHHD' => $faker->word,
        'BrandHHD' => $faker->company,
        'ModelHHD' => $faker->isbn10,
        'CapabilityHHD' => $faker->randomDigit,
        'SerialNumberHHD' => $faker->isbn13,
        'BrandDiscReader' => $faker->company,
        'TypeDiscReader' => $faker->word,
        'active' => true,
        'employee_id' => rand(1,60),
    ];
});

$factory->define(\App\Entities\DataDevice::class, function (Faker\Generator $faker) {
    return [
        'InventoryNumberDevice' => $faker->ean8,
        'NomenclatureDevice' => 'JS3-DEV-'.$faker->randomDigit,
        'DescriptionDevice' => $faker->realText($maxNbChars = 20, $indexSize = 2),
        'BrandDevice' => $faker->company,
        'ModelDevice' => $faker->isbn10,
        'SerialNumberDevice' => $faker->isbn13,
        'ColorDevice' => $faker->safeColorName,
        'DescriptionAdDevice' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'active' => true,
        'employee_id' => rand(1,60),

    ];
});

$factory->define(\App\Entities\ServiceRequest::class, function (Faker\Generator $faker) {
    return [

        'ReasonRequests' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'receptionist' => $faker->name,
        'TechnicianAssigned' => 'ISC. Harvey J. León Uc',
        'employee_id' => rand(1,40),

    ];
});

$factory->define(\App\Entities\EquipmentReception::class, function (Faker\Generator $faker) {
    return [

        'TypeTrouble' => 'Hardware',
        'ReasonReception' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'ObservationReception' => $faker->realText($maxNbChars = 20, $indexSize = 2),
        'AccessoryAdd' => $faker->realText($maxNbChars = 40, $indexSize = 4),
        'Receptionist' => 'ISC. Harvey J. León Uc',
        'Petitioner' => 'Alguien',
        'Receive' => 'Alguien',
        'StatusEquipment' => 'Ready',
        'NumberDictum' => $faker->ean8,
        'NumberDoc' => $faker->ean13,
        'equipment_id' => rand(1,4),
        'user_id' => rand(1,5),

    ];
});


$factory->define(\App\Entities\LowInventoryEq::class, function (Faker\Generator $faker) {
    return [

        'CauseLow' => $faker->realText($maxNbChars = 60, $indexSize = 5),
        'TechnicianDictum' => true,
        'Picture' => true,
        'UpInventory' => true,
        'equipment_id' => rand(1,6),

    ];
});


$factory->define(\App\Entities\LowInventoryDev::class, function (Faker\Generator $faker) {
    return [

        'CauseLow' => $faker->realText($maxNbChars = 60, $indexSize = 5),
        'TechnicianDictum' => true,
        'Picture' => true,
        'UpInventory' => true,
        'device_id' => rand(1,6),

    ];
});

