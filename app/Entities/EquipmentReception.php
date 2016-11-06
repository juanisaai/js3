<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EquipmentReception extends Model
{
    protected $table = "equipmentReceptions";

    protected $fillable = [
        'TypeTrouble',
        'ReasonReception',
        'ObservationReception',
        'Receptionist',
        'Petitioner',
        'Receive',
        'StatusEquipment',
        'NumberDictum',
        'equipment_id',
        'device_id',
        'user_id',
];

    // Relationship with DataEquipment
    public function equipment()
    {
        return $this->belongsTo(DataEquipment::class);
    }
    //-----------------------------------------------

    // Relationship with DataEquipment
    public function device()
    {
        return $this->belongsTo(DataDevice::class);
    }
    //-----------------------------------------------

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
