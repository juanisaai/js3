<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DataDevice extends Model
{
    public $table = "dataDevices";

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
