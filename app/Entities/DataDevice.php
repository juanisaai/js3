<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DataDevice extends Model
{
    public $table = "dataDevices";

    protected $fillable = [
        'TypeDevice', 'BrandDevice', 'ModelDevice', 'ColorDevice', 'NomenclatureDevice', 'SerialNumberDevice', 'InventoryNumberDevice',
    ];

}
