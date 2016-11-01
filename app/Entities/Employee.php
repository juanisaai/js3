<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";

    protected $fillable = [
        'ProfileEmployee', 'FirstName', 'SecondName', 'RoleEmployee', 'area_id',
    ];

    //-------------------Relationship with DataDevice

    public function devices()
    {
        return $this->hasMany(DataDevice::class);
    }

    public function getNumDevicesAttribute()
    {
        return count($this->devices);
    }

    //-----------------------------------------------

    //-------------------Relationship with DataEquipment

    public function equipments()
    {
        return $this->hasMany(DataEquipment::class);
    }

    public function getNumEquipmentsAttribute()
    {
        return count($this->equipments);
    }

    //-----------------------------------------------

    // -----------------------------------Relationship with Areas

    public function Area()
    {
        return $this->belongsTo(Area::class);
    }

    // -----------------------------------Relationship

}
