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


    protected $fillable = [
        'InventoryNumberDevice',
        'NomenclatureDevice',
        'DescriptionDevice',
        'BrandDevice',
        'ModelDevice',
        'SerialNumberDevice',
        'ColorDevice',
        'DescriptionAdDevice',
        'active',
        'employee_id'

    ];

}
