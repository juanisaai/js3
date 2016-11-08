<?php

namespace App\Http\Controllers;

use App\Entities\DataEquipment;
use App\Entities\Employee;
use App\Entities\EquipmentReception;
use App\User;

class EquipmentReceptionController extends Controller
{
    // Read receptions
    public function read()
    {
        $receptions = EquipmentReception::paginate(10);
        return view('equipmentReception/viewReceptions', compact('receptions'));
    }

    // Read details per reception
    public function readDetails($idRec, $idEmp)
    {
        $employee = Employee::find($idEmp);
        $reception = EquipmentReception::find($idRec);
        return view('equipmentReception/viewDetailsRec', compact('reception', 'employee'));
    }

    // Create new reception
    public function create()
    {
        $technicians = user::where('type', '=', 'Technician')->get()->lists('name', 'id');
        $receptionist = user::get()->lists('name', 'name');
        $petitioner = Employee::get()->lists('full_name', 'full_name');
        $equipments = DataEquipment::get()->lists('name_equipment', 'id');
        return view('equipmentReception/createRec', compact('equipments', 'technicians', 'receptionist', 'petitioner'));
    }

    public function store(){

        $this->validate(request(), [
            'TypeTrouble' => 'required|in:Hardware,Software',
            'ReasonReception' => 'required|max:500',
            'ObservationReception' => 'max:500',
            'Receptionist' => 'required',
            'Petitioner' => 'required',
            'Receive' => 'required|max:60',
            'equipment_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = request()->all();
        EquipmentReception::create($data);
        return redirect()->route('seeReceptions');
    }

    public function edit($idRec)
    {
        $reception = EquipmentReception::find($idRec);
        $technicians = user::where('type', '=', 'Technician')->get()->lists('name', 'id');
        $receptionist = user::get()->lists('name', 'name');
        $petitioner = Employee::get()->lists('full_name', 'full_name');
        $equipments = DataEquipment::get()->lists('name_equipment', 'id');
        return view('equipmentReception/updateRec', compact('reception', 'equipments', 'technicians', 'receptionist', 'petitioner'));
    }

    public function update($idRec)
    {
        $reception = EquipmentReception::findOrFail($idRec);

        $this->validate(request(), [
            'TypeTrouble' => 'required|in:Hardware,Software',
            'ReasonReception' => 'required|max:500',
            'ObservationReception' => 'max:500',
            'Receptionist' => 'required',
            'Petitioner' => 'required',
            'Receive' => 'required|max:60',
            'StatusEquipment' => 'in:Ready,GenerateDictum',
            'NumberDictum' => 'unique:equipmentReceptions',

            'equipment_id' => 'required',
            'user_id' => 'required',

        ]);

        $data = request()->all();
        $reception->fill($data)->save();
        return redirect()->route('seeReceptions');
    }


    // Delete
    public function destroy($idRec)
    {
        $reception = EquipmentReception::find($idRec);
        $reception->delete();
        return redirect()->route('seeReceptions');
    }

}




