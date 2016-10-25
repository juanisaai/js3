<?php

namespace App\Http\Controllers;

use App\Entities\AssignDevice;
use App\Entities\DataDevice;
use App\Entities\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\HttpFoundation\Session\Session;

class AssignDeviceController extends Controller
{

    public function newAssign()
    {
        $employees = Employee::has('devices', '=', 0)->get();
        return View('assigndevices/newAssignDevice', compact('employees'));

    }

    public function seeAssigns()
    {
        $employees = Employee::has('devices')->get();
        return View('assigndevices/viewEmployeesDev', compact('employees'));

    }

    public function seeDetailsAssign($id)
    {
        $employee = Employee::find($id);
        return View('assigndevices/viewDetailsAssignDev')->with('employee', $employee);
    }








}
