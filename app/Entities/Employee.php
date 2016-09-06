<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable = [
        'ProfileEmployee', 'FirstName', 'SecondName', 'RoleEmployee', 'area_id',
    ];


    public function Area()
    {
        return $this->belongsTo(Area::class);
    }
}
