<?php

namespace App\Http\Controllers;

use App\Entities\DataDevice;
use App\Entities\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\Cloner\Data;

class AssignDeviceController extends Controller
{
    // View employees without devices assigned

    public function newAssign()
    {
        //here stay all devices without employee
        $devices = DataDevice::where('employee_id', '=', null)->get();
        return View('assigndevices/newAssignDevice', compact('devices'));

    }

    public function newAssignDet($idEmp)
    {
        $employee = Employee::find($idEmp);
        $devices = DataDevice::where('employee_id', '=', null)->get();
        return View('assigndevices/newAssignDeviceDet', compact('devices', 'employee'));

    }

    // Create new assign

    public function createAssignDev($idDev)
    {
        $device = DataDevice::find($idDev);
        $employees = Employee::has('devices', '=', 0)->get();
        return View('assigndevices/createAssignDev', compact('employees', 'device'));
    }

    // Store assign
    public function storeAssignDev($idDev, $idEmp)
    {
        $employee = Employee::find($idEmp);

        $device = DataDevice::find($idDev);
        $device->employee_id = $idDev;

        $employee->devices()->save($device);

        return redirect()->route('seeEmployeesDev');

    }

    // View employees with devices assigned

    public function seeAssigns()
    {
        $employees = Employee::has('devices')->get();
        return View('assigndevices/viewEmployeesDev', compact('employees'));

    }

    // View details of device assigned

    public function seeDetailsAssign($id)
    {
        $employee = Employee::find($id);
        return View('assigndevices/viewDetailsAssignDev')->with('employee', $employee);
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
