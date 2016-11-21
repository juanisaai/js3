<?php

namespace App\Http\Controllers;

use App\Entities\Employee;
use App\Entities\ServiceRequest;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class ServiceRequestController extends Controller
{
    //READ
    public function read(){
        $serquests = ServiceRequest::paginate(10);
        return view('serviceRequest/viewAllSerquests', compact('serquests'));
    }

    // Read details per reception
    public function printDetails($id, $idEmp, $ver)
    {
        $date = Carbon::now();

        $employee = Employee::find($idEmp);
        $serquest = ServiceRequest::find($id);

        $pdf = PDF::loadView('serviceRequest/printDetailsSerquest', ['serquest' => $serquest, 'employee' => $employee]);
        if (($ver) == 1){
            return $pdf->stream('hoja_servicio_emp_'.$idEmp.'_folio_'.$id.'_'.$date->toDateTimeString().'.pdf');
        }
        elseif (($ver) == 2){
            return $pdf->download('hoja_servicio_emp_'.$idEmp.'_folio_'.$id.'_'.$date->toDateTimeString().'.pdf');
        }

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
            'ReasonRequests' => 'required|max:1000',
            'receptionist' => 'required',
            'TechnicianAssigned' => 'required',
            'DescriptionService' => 'required|max:1000',
            'employee_id' => 'required',
        ]);

        $data = request()->all();
        ServiceRequest::create($data);
        Session::flash('flash_message', '¡Hoja de servicio agregada exitosamente!');
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
            'ReasonRequests' => 'required|max:1000',
            'receptionist' => 'required',
            'TechnicianAssigned' => 'required',
            'DescriptionService' => 'required|max:1000',
            'employee_id' => 'required',

        ]);

        $data = request()->all();
        $serquest->fill($data)->save();
        Session::flash('flash_message', '¡Hoja de servicio actualizada exitosamente!');
        return redirect()->route('seeAllRequests');

    }


    //Delete
    public function deleteSerquest($id)
    {
        $serquest = ServiceRequest::find($id);
        $serquest->delete();
        Session::flash('flash_message', '¡Hoja de servicio eliminada exitosamente!');
        return redirect()->route('seeAllRequests');
    }
}
