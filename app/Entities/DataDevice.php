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
        return ucfirst($this->DescriptionDevice) . ' - ' . ucfirst($this->SerialNumberDevice). ' - ' . ucfirst($this->TypeDevice) . ' - ' . ucfirst($this->BrandDevice);
    }

    public function getDictumDeviceAttribute()
    {
        return ucfirst($this->DescriptionDevice) . ' - ' . ucfirst($this->TypeDevice) . ' - Marca: ' . ucfirst($this->BrandDevice). ' - Modelo: ' . ucfirst($this->ModelDevice). ' - Color: ' . ucfirst($this->ColorDevice);
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
