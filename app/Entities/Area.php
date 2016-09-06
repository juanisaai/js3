<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'NameArea', 'UnitArea', 'ExtensionArea', 'DirectorateArea',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
