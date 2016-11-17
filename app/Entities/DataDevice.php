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

    //--------------------Relationship with LowInventoryDev

    public function lowDevices()
    {
        return $this->hasMany(LowInventoryDev::class);
    }

}
