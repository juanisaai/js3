<?php

namespace App\Http\Controllers;

use App\Entities\Area;
use App\Entities\Employee;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    //Create
    public function create(){
        $areas = Area::lists('NameArea', 'id');
        return view('employees/createEmployee', compact('areas'));
    }

    public function store(){

        $this->validate(request(), [
            'ProfileEmployee' => 'required|max:50',
            'FirstName' => 'required|max:50',
            'SecondName' => 'required|max:50',
            'RoleEmployee' => 'max:150',
            'area_id' => 'required'

        ]);

        $data = request()->all();
        Employee::create($data);
        Session::flash('flash_message', '¡Empleado creado exitosamente!');
        return redirect()->route('readEmployee');


    }

    //Read
    public function seeEmployees()
    {
        $employees = Employee::paginate(10);
        return view('employees/viewEmployees', compact('employees'));
    }


    //Update

    public function editEmployee($id)
    {
        $areas = Area::lists('NameArea', 'id');
        $employee = Employee::findOrFail($id);
        return view('employees/updateEmployee')->withEmployee($employee)->withAreas($areas);
    }

    public function updateEmployee($id)
    {
        $employee = Employee::findOrFail($id);

        $this->validate(request(), [
            'ProfileEmployee' => 'required|max:50',
            'FirstName' => 'required|max:50',
            'SecondName' => 'required|max:50',
            'RoleEmployee' => 'max:150',
            'area_id' => 'required'

        ]);

        $data = request()->all();
        $employee->fill($data)->save();
        Session::flash('flash_message', '¡Empleado actualizado exitosamente!');
        return redirect()->route('readEmployee');

    }


    //Delete
    public function deleteEmployee($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        Session::flash('flash_message', '¡Empleado eliminado exitosamente!');
        return redirect()->route('readEmployee');
    }

}
