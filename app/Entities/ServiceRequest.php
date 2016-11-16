<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class ServiceRequest extends Model
{
    protected $table = "serviceRequests";

    protected $fillable = [
        'ReasonRequests', 'receptionist', 'TechnicianAssigned', 'DescriptionService','employee_id'
    ];

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }

    //relationship with employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
