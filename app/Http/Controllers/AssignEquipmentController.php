<?php

namespace App\Http\Controllers;

use App\Entities\DataEquipment;
use App\Entities\Employee;
use Barryvdh\DomPDF\Facade as PDF;

class AssignEquipmentController extends Controller
{
    // View employees with equipments assigned
    public function seeAssigns()
    {
        $employees = Employee::has('equipments')->paginate(10);
        return View('assignequipment/viewEmployeesEq', compact('employees'));
    }

    // View details of equipment assigned
    public function seeDetailsAssignEq($id)
    {
        $employee = Employee::find($id);
        return View('assignequipment/viewDetailsAssignEq')->with('employee', $employee);
    }

    // View details of equipment assigned
    public function seeInvEq($id, $idEmp)
    {
        $employee = Employee::find($idEmp);
        $equipment = DataEquipment::find($id);
        return View('assignequipment/viewInvEq', compact('equipment', 'employee'));
    }

    // View details of equipment assigned
    public function printInvEq($id, $idEmp)
    {
        $employee = Employee::find($idEmp);
        $equipment = DataEquipment::find($id);

        $pdf = PDF::loadView('assignequipment/printInvEq', ['employee' => $employee, 'equipment' => $equipment]);
        return $pdf->download('reporte_inventario_equipo_'.$idEmp.'_'.$id.'.pdf');
    }

    // View employees without equipments assigned
    public function newAssignEq()
    {
        //here stay all equipments without employee
        $equipments = DataEquipment::where('employee_id', '=', null)->paginate(6);
        return View('assignequipment/newAssignEq', compact('equipments'));
    }

    // Create new assign in View newAssignEq
    public function createAssignEq($idEq)
    {
        $equipment = DataEquipment::find($idEq);
        $employees = Employee::has('equipments', '=', 0)->paginate(6);
        return View('assignequipment/createAssignEq', compact('employees', 'equipment'));
    }

    // Store assign in View newAssignEq and newAssignDetEq
    public function storeAssignEq($idEq, $idEmp)
    {
        $employee = Employee::find($idEmp);
        $equipment = DataEquipment::find($idEq);

        $equipment->employee_id = $idEq;
        $employee->equipments()->save($equipment);

        return redirect()->route('seeDetailsAssignEq', ['id' => $idEmp]);
    }


    // Create new assign in View newAssignEq
    public function newAssignDetEq($idEmp)
    {
        $employee = Employee::find($idEmp);
        $equipments = DataEquipment::where('employee_id', '=', null)->paginate(6);
        return View('assignequipment/newAssignDetEq', compact('equipments', 'employee'));
    }

    // Delete association
    public function deleteAssignEq($idEq)
    {
        $equipments = DataEquipment::find($idEq);
        $equipments->employee()->dissociate();
        $equipments->save();
        return redirect()->back();
    }

}
