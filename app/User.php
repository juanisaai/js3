<?php

namespace App;

use App\Entities\DataDictum;
use App\Entities\EquipmentReception;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'contact', 'password', 'active', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        if (! empty ($value))
        {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function setContactAttribute($value)
    {
        if (! empty ($value))
        {
            $this->attributes['contact'] = $value;
        }
    }



    public function receptions()
    {
        return $this->hasMany(EquipmentReception::class);
    }

    public function dictums()
    {
        return $this->hasMany(DataDictum::class);
    }

}
