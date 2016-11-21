<?php

namespace App\Http\Controllers;

use App\Entities\DataDevice;
use App\Entities\Employee;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class AssignDeviceController extends Controller
{
    // View employees without devices assigned
    public function newAssign()
    {
        //here stay all devices without employee
        $devices = DataDevice::where('employee_id', '=', null)->orderBy('id', 'asc')->paginate(6);
        return View('assigndevices/newAssignDevice', compact('devices'));
    }

    public function newAssignDet($idEmp)
    {
        $employee = Employee::find($idEmp);
        $devices = DataDevice::where('employee_id', '=', null)->orderBy('id', 'asc')->paginate(6);
        return View('assigndevices/newAssignDeviceDet', compact('devices', 'employee'));
    }

    // Create new assign
    public function createAssignDev($idDev)
    {
        $device = DataDevice::find($idDev);
        $employees = Employee::has('devices', '=', 0)->orderBy('id', 'asc')->paginate(6);
        return View('assigndevices/createAssignDev', compact('employees', 'device'));
    }

    // Store assign
    public function storeAssignDev($idDev, $idEmp)
    {
        $employee = Employee::find($idEmp);
        $device = DataDevice::find($idDev);

        $device->employee_id = $idDev;
        $employee->devices()->save($device);
        Session::flash('flash_message', '¡Dispositivo asignado exitosamente!');
        return redirect()->route('seeDetailsAssignDev', ['id' => $idEmp]);
    }

    // View employees with devices assigned
    public function seeAssigns()
    {
        $employees = Employee::orderBy('id', 'asc')->has('devices')->paginate(10);
        return View('assigndevices/viewEmployeesDev', compact('employees'));
    }

    // View details of device assigned
    public function seeDetailsAssign($id)
    {
        $employee = Employee::findOrFail($id);
        return View('assigndevices/viewDetailsAssignDev', compact('employee'));
    }

    // View details of device assigned
    public function printInvDev($id, $idEmp, $ver)
    {
        $date = Carbon::now();

        $device = DataDevice::findOrFail($id);
        $employee = Employee::findOrFail($idEmp);

        $pdf = PDF::loadView('assigndevices/printInvDev', ['employee' => $employee, 'device' => $device]);

        if (($ver) == 1){
            return $pdf->stream('reporte_inventario_dispositivo_emp_'.$idEmp.'_folio_'.$id.'_'.$date->toDateTimeString().'.pdf');
        }
        elseif (($ver) == 2){
            return $pdf->download('reporte_inventario_dispositivo_emp_'.$idEmp.'_folio_'.$id.'_'.$date->toDateTimeString().'.pdf');
        }

    }

    // Delete association
    public function deleteAssignDev($idDev)
    {
        $devices = DataDevice::find($idDev);
        $devices->employee()->dissociate();
        $devices->save();
        Session::flash('flash_message', '¡Asignación eliminada exitosamente!');
        return redirect()->back();
    }

}
