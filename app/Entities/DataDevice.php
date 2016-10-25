<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DataDevice extends Model
{
    protected $table = "dataDevices";

    //--------------------Relationship with employees

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    //-----------------------------------------------

    // -----------------------------------Relationship
    public function DataDevice()
    {
        return $this->belongsTo(DataDevice::class);
    }

    // -----------------------------------Relationship

    protected $fillable = [
        'InventoryNumberDevice',
        'NomenclatureDevice',
        'DescriptionDevice',
        'BrandDevice',
        'ModelDevice',
        'SerialNumberDevice',
        'ColorDevice',
        'DescriptionAdDevice',
    ];

}
