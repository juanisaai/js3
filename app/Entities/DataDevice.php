<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class DataDevice extends Model
{
    public $table = "dataDevices";

    protected $fillable = [
        'TypeDevice', 'ModelDevice', 'BrandDevice', 'SerialNumberDevice', 'InventoryNumberDevice', 'supplier_id',
    ];


    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
