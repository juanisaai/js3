<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

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

    //--------------------Relationship with dataEquipment

    public function equipment()
    {
        return $this->belongsTo(DataEquipment::class);
    }


}
