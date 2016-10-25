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

    // -----------------------------------Relationship

    public function Area()
    {
        return $this->belongsTo(Area::class);
    }

    /*
     * This relationships below is for assign devices
     * */

    public function AssignDevice()
    {
        return $this->hasMany(AssignDevice::class);
    }

    // -----------------------------------Relationship

}
