<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DataDevice extends Model
{
    protected $table = "dataDevices";

    protected $fillable = [
        'InventoryNumberDevice',
        'NomenclatureDevice',
        'DescriptionDevice',
        'TypeDevice',
        'BrandDevice',
        'ModelDevice',
        'SerialNumberDevice',
        'ColorDevice',
        'DescriptionAdDevice',
        'active',
        'employee_id'
    ];

    public function getNameDeviceAttribute()
    {
        return ucfirst($this->InventoryNumberDevice) . ' | ' . ucfirst($this->NomenclatureDevice) . ' | ' . ucfirst($this->DescriptionDevice);
    }

    public function getDictumDeviceAttribute()
    {
        return ucfirst($this->DescriptionDevice) . ' - ' . ucfirst($this->TypeDevice) . ' - MARCA: ' . ucfirst($this->BrandDevice). ' - MODELO: ' . ucfirst($this->ModelDevice). ' - COLOR: ' . ucfirst($this->ColorDevice);
    }

    //--------------------Relationship with employees
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    //-----------------------------------------------

    //--------------------Relationship with employees
    public function equipmentReceptions()
    {
        return $this->hasMany(EquipmentReception::class);
    }
    //-----------------------------------------------

    //--------------------Relationship with dictum

    public function dictums()
    {
        return $this->hasMany(DataDictum::class);
    }


}
