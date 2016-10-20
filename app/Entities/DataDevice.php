<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DataDevice extends Model
{
    protected $table = "dataDevices";

    // -----------------------------------Relationship
    public function Employees()
    {
        return $this->belongsToMany(Employee::class);
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
