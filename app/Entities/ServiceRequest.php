<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    protected $table = "serviceRequests";

    protected $fillable = [
        'ReasonRequests', 'receptionist', 'TechnicianAssigned', 'employee_id'
    ];

    //relationship with employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
