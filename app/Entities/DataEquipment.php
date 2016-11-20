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
        'EquipmentSO',
        'ArchitectureOS',
        'DistributionOS',
        'SerialNumberOS',
        'InventoryNumberOS',
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
        'active',
    ];

    public function getNameEquipmentAttribute()
    {
        return ucfirst($this->InventoryNumberEquipment) . ' | ' . ucfirst($this->NomenclatureEquipment) . ' | ' . ucfirst($this->DescriptionEquipment);
    }

    public function getDictumEquipmentAttribute()
    {
        return ucfirst($this->TypeEquipment) . ' ' . ucfirst($this->TypeAssemblyEquipment) . ' - ' . ucfirst($this->EquipmentSO). ' - ' . ucfirst($this->BrandCPU). ' ' . ucfirst($this->ModelCPU). ' ' . ucfirst($this->FrequencyCPU). ' - RAM ' . ucfirst($this->CapabilityRam);
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

    //--------------------Relationship with dictum

    public function dictums()
    {
        return $this->hasMany(DataDictum::class);
    }





}
