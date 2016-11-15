<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class LowInventoryEq extends Model
{
    protected $table = "low_inventory_eqs";

    protected $fillable = [
        'CauseLow',
        'TechnicianDictum',
        'Picture',
        'UpInventory',
        'equipment_id',
    ];

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }

    //--------------------Relationship with dataEquipment

    public function equipment()
    {
        return $this->belongsTo(DataEquipment::class);
    }


}
