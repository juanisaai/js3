<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class AssignDevice extends Model
{
    protected $table = "assign_devices";

    public function Device ()
    {
        return $this->belongsTo(DataDevice::class);
    }

    public function Employees()
    {
        return $this->hasMany(Employee::class);
    }
}
