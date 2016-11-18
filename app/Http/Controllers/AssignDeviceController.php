<?php

namespace App\Http\Controllers;

use App\Entities\DataDevice;
use App\Entities\Employee;
use Barryvdh\DomPDF\Facade as PDF;

class AssignDeviceController extends Controller
{
    // View employees without devices assigned
    public function newAssign()
    {
        //here stay all devices without employee
        $devices = DataDevice::where('employee_id', '=', null)->paginate(6);
        return View('assigndevices/newAssignDevice', compact('devices'));
    }

    public function newAssignDet($idEmp)
    {
        $employee = Employee::find($idEmp);
        $devices = DataDevice::where('employee_id', '=', null)->paginate(6);
        return View('assigndevices/newAssignDeviceDet', compact('devices', 'employee'));
    }

    // Create new assign
    public function createAssignDev($idDev)
    {
        $device = DataDevice::find($idDev);
        $employees = Employee::has('devices', '=', 0)->paginate(6);
        return View('assigndevices/createAssignDev', compact('employees', 'device'));
    }

    // Store assign
    public function storeAssignDev($idDev, $idEmp)
    {
        $employee = Employee::find($idEmp);
        $device = DataDevice::find($idDev);

        $device->employee_id = $idDev;
        $employee->devices()->save($device);

        return redirect()->route('seeDetailsAssignDev', ['id' => $idEmp]);
    }

    // View employees with devices assigned
    public function seeAssigns()
    {
        $employees = Employee::has('devices')->paginate(10);
        return View('assigndevices/viewEmployeesDev', compact('employees'));
    }

    // View details of device assigned
    public function seeDetailsAssign($id)
    {
        $employee = Employee::findOrFail($id);
        return View('assigndevices/viewDetailsAssignDev', compact('employee'));
    }

    // View details of device assigned
    public function seeInvDev($id, $idEmp)
    {
        $device = DataDevice::findOrFail($id);
        $employee = Employee::findOrFail($idEmp);
        return View('assigndevices/viewInvDev', compact('employee', 'device'));
    }

    // View details of device assigned
    public function printInvDev($id, $idEmp)
    {
        $device = DataDevice::findOrFail($id);
        $employee = Employee::findOrFail($idEmp);

        $pdf = PDF::loadView('assigndevices/printInvDev', ['employee' => $employee, 'device' => $device]);
        return $pdf->download('reporte_inventario_dispositivo_'.$idEmp.'_'.$id.'.pdf');

    }

    // Delete association
    public function deleteAssignDev($idDev)
    {
        $devices = DataDevice::find($idDev);
        $devices->employee()->dissociate();
        $devices->save();
        return redirect()->back();
    }

}
