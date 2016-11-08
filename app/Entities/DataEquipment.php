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

    public function getNameEquipmentAttribute()
    {
        return ucfirst($this->InventoryNumberEquipment) . ' | ' . ucfirst($this->NomenclatureEquipment) . ' | ' . ucfirst($this->DescriptionEquipment);
    }

    //--------------------Relationship with employees

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getFullNameAttribute()
    {
        return ucfirst($this->employee->ProfileEmployee) . ' ' . ucfirst($this->employee->FirstName) . ' ' . ucfirst($this->employee->SecondName);
    }

    //------------------------------------------------

    //--------------------Relationship with EquipmentReception

    public function equipmentReceptions()
    {
        return $this->hasMany(EquipmentReception::class);
    }

    //-------------------------------------------------

    //--------------------Relationship with LowInventoryEq

    public function lowEquipments()
    {
        return $this->hasMany(LowInventoryEq::class);
    }



}
