<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DataEquipment extends Model
{
    protected $table = "dataEquipments";

    protected $fillable = [
        'InventoryNumberEquipment',
        'NomenclatureEquipment',
        'DescriptionEquipment',
        'BrandEquipment',
        'ModelEquipment',
        'SerialNumberEquipment',
        'ColorEquipment',
        'DescriptionAdEquipment',
        //View details
        'TypeEquipment',
        'TypeAssemblyEquipment',
        'OSEquipment',
        'IPAddressEquipment',
        'BrandMotherB',
        'ModelMotherB',
        'SerialNumberMotherB',
        'BrandCPU',
        'ModelCPU',
        'FrequencyCPU',
        'BrandRam',
        'TypeRam',
        'CapabilityRam',
        'TypeHHD',
        'BrandHHD',
        'ModelHHD',
        'CapabilityHHD',
        'SerialNumberHHD',
        'BrandDiscReader',
        'TypeDiscReader',
    ];

    //--------------------Relationship with employees

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    //------------------------------------------------

}
