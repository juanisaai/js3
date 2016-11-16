<?php

namespace App\Http\Controllers;

use App\Entities\Employee;
use App\Entities\ServiceRequest;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

use App\Http\Requests;

class ServiceRequestController extends Controller
{
    //READ
    public function read(){
        $serquests = ServiceRequest::paginate(10);
        return view('serviceRequest/viewAllSerquests', compact('serquests'));
    }

    // Read details per reception
    public function readDetails($id, $idEmp)
    {
        $employee = Employee::find($idEmp);
        $serquest = ServiceRequest::find($id);
        return view('serviceRequest/viewDetailsSerquest', compact('serquest', 'employee'));
    }

    // Read details per reception
    public function printDetails($id, $idEmp)
    {
        $employee = Employee::find($idEmp);
        $serquest = ServiceRequest::find($id);

        $pdf = PDF::loadView('serviceRequest/printDetailsSerquest', ['serquest' => $serquest, 'employee' => $employee]);
        return $pdf->download('hoja_servicio_'.$idEmp.'_'.$id.'.pdf');
    }

    //CREATE
    public function create()
    {
        $receptionist = user::get()->lists('name', 'name');
        $technicians = user::where('type', '=', 'Technician')->get()->lists('name', 'name');
        $employee = Employee::get()->lists('full_name', 'id');
        return view('serviceRequest/createSerquest', compact('employee', 'technicians', 'receptionist'));
    }

    public function store()
    {
        $this->validate(request(), [
            'ReasonRequests' => 'required',
            'receptionist' => 'required|max:60',
            'TechnicianAssigned' => 'required|max:60',
            'DescriptionService' => 'max:500',
            'employee_id' => 'required',
        ]);

        $data = request()->all();
        ServiceRequest::create($data);
        return redirect()->route('seeAllRequests');
    }

    // edit update
    public function edit($id)
    {
        $receptionist = user::get()->lists('name', 'name');
        $technicians = user::where('type', '=', 'Technician')->get()->lists('name', 'name');
        $employee = Employee::get()->lists('full_name', 'id');
        $serquest = ServiceRequest::findOrFail($id);
        return view('serviceRequest/updateSerquest', compact('employee', 'serquest', 'technicians', 'receptionist'));
    }

    // store update
    public function update($id)
    {
        $serquest = ServiceRequest::findOrFail($id);

        $this->validate(request(), [
            'ReasonRequests' => 'required',
            'receptionist' => 'required|max:60',
            'TechnicianAssigned' => 'required|max:60',
            'DescriptionService' => 'max:500',
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
