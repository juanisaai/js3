<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";

    protected $fillable = [
        'ProfileEmployee', 'FirstName', 'SecondName', 'RoleEmployee', 'area_id',
    ];

    // -----------------------------------Relationship

    public function Area()
    {
        return $this->belongsTo(Area::class);
    }

    /*
     * This relationships below is for assign devices
     * */

    public function DataDevices()
    {
        return $this->belongsToMany(DataDevice::class);
    }

    // -----------------------------------Relationship

}
