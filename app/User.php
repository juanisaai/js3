<?php

namespace App;

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

    public function getIsAdminAttribute()
    {
        $this->type = 'Admin';
    }

    public function getIsCollaborateAttribute()
    {
        $this->type = 'Collaborate';
    }

    public function getIsTechnicianAttribute()
    {
        $this->type = 'Technician';
    }


    public function receptions()
    {
        return $this->hasMany(EquipmentReception::class);
    }

}
