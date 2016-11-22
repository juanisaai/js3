<?php

namespace App\Http\Controllers;

use App\Entities\DataDevice;
use App\Entities\DataDictum;
use App\Entities\DataEquipment;
use App\Entities\Employee;
use App\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Session;

class DictumController extends Controller
{
    public function createDev()
    {
        $users = User::lists('name', 'id');
        $devices = DataDevice::where('active', '=', true)->orderBy('id', 'asc')->get()->lists('name_device', 'id');
        return view('dictums/createDev', compact('devices', 'users'));
    }

    public function storeDev()
    {
        $this->validate(request(), [
            'Problematic' => 'required|max:1000',
            'Dictum' => 'required|max:1000',
            'Recommendation' => 'max:1000',
            'observations' => 'max:1000',
            'device_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = request()->all();
        DataDictum::create($data);
        Session::flash('flash_message', '¡Dictamen de dispositivo creado exitosamente!');
        return redirect()->route('readDictums');
    }

    public function readDev()
    {
        $dictums = DataDictum::orderBy('id', 'desc')->has('device')->paginate(5);
        return view('dictums/viewDictums', compact('dictums'));
    }

    public function showDev($idDictum, $idDev, $idUser, $area)
    {
        $area = Employee::findOrFail($area);
        $user = User::findOrFail($idUser);
        $device = DataDevice::findOrFail($idDev);
        $dictum = DataDictum::findOrFail($idDictum);
        return view('dictums/viewDetailsDev', compact('area', 'user', 'device', 'dictum'));

    }

    public function printDev($idDictum, $idDev, $idUser, $area, $ver)
    {
        $date = Carbon::now();

        $area = Employee::findOrFail($area);
        $user = User::findOrFail($idUser);
        $device = DataDevice::findOrFail($idDev);
        $dictum = DataDictum::findOrFail($idDictum);

        $pdf = PDF::loadView('dictums/printDictumDev', ['device' => $device, 'dictum' => $dictum, 'user' => $user, 'area' => $area])->setPaper('CARTA EE. UU.', 'portrait');

        if (($ver) == 1){
            return $pdf->stream('dictamen_dispositivo_'.$idDev.'_folio_'.$idDictum.'_'.$date->toDateTimeString().'.pdf');
        }
        elseif (($ver) == 2){
            return $pdf->download('dictamen_dispositivo_'.$idDev.'_folio_'.$idDictum.'_'.$date->toDateTimeString().'.pdf');
        }
    }

    public function editDev($idDictum)
    {
        $dictum = DataDictum::findOrFail($idDictum);
        $users = User::lists('name', 'id');
        $devices = DataDevice::where('active', '=', true)->orderBy('id', 'asc')->get()->lists('name_device', 'id');
        return view('dictums/editDev', compact('dictum', 'devices', 'users'));
    }

    public function updateDev($idDictum)
    {
        $dictum = DataDictum::findOrFail($idDictum);

        $this->validate(request(), [
            'Problematic' => 'required|max:1000',
            'Dictum' => 'required|max:1000',
            'Recommendation' => 'max:1000',
            'observations' => 'max:1000',
            'device_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = request()->all();
        $dictum->fill($data)->save();
        Session::flash('flash_message', '¡Dictamen de dispositivo actualizado exitosamente!');
        return redirect()->route('readDictums');
    }

    public function destroyDev($idDictum)
    {
        $dictum = DataDictum::find($idDictum);
        $dictum->delete();
        Session::flash('flash_message', '¡Dictamen de dispositivo eliminado exitosamente!');
        return redirect()->route('readDictums');
    }

    /*
     * CRUD Dictums Eq
     * */

    public function readEq()
    {
        $dictumEqs = DataDictum::orderBy('id', 'desc')->has('equipment')->paginate(5);
        return view('dictums/viewDictumsEq', compact('dictumEqs'));
    }

    public function printEq($idDictumEq, $idEq, $idUser, $area, $ver)
    {
        $date = Carbon::now();

        $area = Employee::findOrFail($area);
        $user = User::findOrFail($idUser);
        $equipment = DataEquipment::findOrFail($idEq);
        $dictum = DataDictum::findOrFail($idDictumEq);

        $pdf = PDF::loadView('dictums/printDictumEq', ['equipment' => $equipment, 'dictum' => $dictum, 'user' => $user, 'area' => $area])->setPaper('CARTA EE. UU.', 'portrait');

        if (($ver) == 1){
            return $pdf->stream('dictamen_equipo_'.$idEq.'_folio_'.$idDictumEq.'_'.$date->toDateTimeString().'.pdf');
        }
        elseif (($ver) == 2){
            return $pdf->download('dictamen_equipo_'.$idEq.'_folio_'.$idDictumEq.'_'.$date->toDateTimeString().'.pdf');
        }
    }

    public function showEq($idDictumEq, $idEq, $idUser, $area)
    {
        $area = Employee::findOrFail($area);
        $user = User::findOrFail($idUser);
        $equipment = DataEquipment::findOrFail($idEq);
        $dictum = DataDictum::findOrFail($idDictumEq);

        return view('dictums/viewDetailsEq', compact('area', 'user', 'equipment', 'dictum'));
    }

    public function createEq()
    {
        $users = User::lists('name', 'id');
        $equipments = DataEquipment::where('active', '=', true)->orderBy('id', 'asc')->get()->lists('name_equipment', 'id');
        return view('dictums/createEq', compact('equipments', 'users'));
    }

    public function storeEq()
    {
        $this->validate(request(), [
            'Problematic' => 'required|max:500',
            'Dictum' => 'required|max:500',
            'Recommendation' => 'max:300',
            'observations' => 'max:300',
            'equipment_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = request()->all();
        DataDictum::create($data);
        Session::flash('flash_message', '¡Dictamen de equipo creado exitosamente!');
        return redirect()->route('readDictumsEq');
    }

    public function editEq($idDictum)
    {
        $dictum = DataDictum::findOrFail($idDictum);
        $users = User::lists('name', 'id');
        $equipments = DataEquipment::where('active', '=', true)->orderBy('id', 'asc')->get()->lists('name_equipment', 'id');
        return view('dictums/editEq', compact('dictum', 'equipments', 'users'));
    }

    public function updateEq($idDictum)
    {
        $dictum = DataDictum::findOrFail($idDictum);

        $this->validate(request(), [
            'Problematic' => 'required|max:500',
            'Dictum' => 'required|max:500',
            'Recommendation' => 'max:300',
            'observations' => 'max:300',
            'equipment_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = request()->all();
        $dictum->fill($data)->save();
        Session::flash('flash_message', '¡Dictamen de equipo actualizado exitosamente!');
        return redirect()->route('readDictumsEq');
    }

    public function destroyEq($idDictum)
    {
        $dictum = DataDictum::find($idDictum);
        $dictum->delete();
        Session::flash('flash_message', '¡Dictamen de equipo eliminado exitosamente!');
        return redirect()->route('readDictumsEq');
    }



}
