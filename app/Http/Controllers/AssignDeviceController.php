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

    public function saveAssign($idEmployee)
    {
        $assigns = Employee::find($idEmployee);
        $dataDevice = DataDevice::find(3);

        //This function is for save new records
        $assigns->dataDevices()->attach($dataDevice);
        return redirect()->route('seeDetailsAssignDev', $idEmployee);

        //This function is for delete records
        //$assigns->dataDevices()->detach($dataDevice);

        // $assigns->dataDevices()->save($dataDevice);


        /** $dataDevice = new DataDevice(
            [
                'InventoryNumberDevice' => 'Function!',
                'NomenclatureDevice' => 'Function!'

            ]);
        $assigns->dataDevices()->save($dataDevice);
        */
    }

    public function seeAllEmployees()
    {
        $employees = Employee::all();
        return View('assigndevices/viewEmployeesDev', compact('employees'));

    }

    public function seeDetailsAssign($id)
    {
        $employee = Employee::find($id);
        return View('assigndevices/viewDetailsAssignDev')->with('employee', $employee);
    }








}
