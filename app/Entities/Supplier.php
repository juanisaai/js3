<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = "suppliers";

    protected $fillable = [
      'NameSupplier',
    ];

    public function DataEquipments()
    {
        return $this->hasMany(DataEquipment::class);
    }

    public function DataDevices()
    {
        return $this->hasMany(DataDevice::class);
    }


}
