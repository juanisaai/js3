<?php

namespace App\Http\Controllers;

use App\Entities\Employee;
use App\Entities\ServiceRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class ServiceRequestController extends Controller
{
    //READ
    public function read(){
        $serquests = ServiceRequest::paginate(10);
        return view('serviceRequest/viewAllSerquests', compact('serquests'));
    }

    //CREATE
    public function create()
    {
        $folios      = ServiceRequest::all();
        $folioActual  = $folios->last();
        $folioView = $folioActual->id + 1;

        $employee = Employee::get()->lists('full_name', 'id');
        return view('serviceRequest/createSerquest', compact('employee', 'folioView'));
    }

    public function store()
    {
        $this->validate(request(), [
            'ReasonRequests' => 'required',
            'receptionist' => 'required|max:60',
            'TechnicianAssigned' => 'required|max:60',
            'employee_id' => 'required',
        ]);

        $data = request()->all();
        ServiceRequest::create($data);
        return redirect()->route('seeAllRequests');
    }

    // edit update
    public function edit($id)
    {
        $employee = Employee::get()->lists('full_name', 'id');
        $serquest = ServiceRequest::findOrFail($id);
        return view('serviceRequest/updateSerquest', compact('employee', 'serquest'));
    }

    // store update
    public function update($id)
    {
        $serquest = ServiceRequest::findOrFail($id);

        $this->validate(request(), [
            'ReasonRequests' => 'required',
            'receptionist' => 'required|max:60',
            'TechnicianAssigned' => 'required|max:60',
            'employee_id' => 'required',

        ]);

        $data = request()->all();
        $serquest->fill($data)->save();
        return redirect()->route('seeAllRequests');

    }


    //Delete
    public function deleteSerquest($id)
    {
        $serquest = ServiceRequest::find($id);
        $serquest->delete();
        return redirect()->route('seeAllRequests');
    }
}
