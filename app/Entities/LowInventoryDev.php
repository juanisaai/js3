<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class LowInventoryDev extends Model
{
    protected $table = 'low_inventory_devs';

    protected $fillable = [
        'CauseLow',
        'TechnicianDictum',
        'Picture',
        'UpInventory',
        'device_id',
    ];

    //--------------------Relationship with dataDevices

    public function device()
    {
        return $this->belongsTo(DataDevice::class);
    }
}
