<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class DataDictum extends Model
{
    protected $table = 'data_dictum';

    protected $fillable = [
        'Problematic',
        'Dictum',
        'Recommendation',
        'observations',
        'device_id',
        'equipment_id',
        'user_id'
    ];

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }

    public function device()
    {
        return $this->belongsTo(DataDevice::class);
    }

    public function equipment()
    {
        return $this->belongsTo(DataEquipment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
