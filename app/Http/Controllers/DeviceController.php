<?php

namespace App\Http\Controllers;

use App\Entities\DataDevice;
use App\Entities\Supplier;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class DeviceController extends Controller
{
    //Create
    public function create(){
        return view('devices/createDevice');
    }

    public function store(){

        $this->validate(request(), [
            'InventoryNumberDevice' => 'max:25',
            'NomenclatureDevice' => 'max:50',
            'DescriptionDevice' => 'max:100',
            'TypeDevice' => 'max:50',
            'BrandDevice' => 'max:50',
            'ModelDevice' => 'max:50',
            'SerialNumberDevice' => 'max:25',
            'ColorDevice' => 'max:50',
            'DescriptionAdDevice' => 'max:50',
            'active' => 'required',

        ]);

        $data = request()->all();
        DataDevice::create($data);
        Session::flash('flash_message', 'Device successfully added!');
        return redirect()->route('readDevice');
    }

    //Read
    public function seeDevices()
    {
        $devices = DataDevice::paginate(10);
        return view('devices/viewDevices', compact('devices'));
    }

    public function seeDetail($id)
    {
        $device = DataDevice::findOrFail($id);
        return view('devices/viewDetailsDevice', compact('device'));
    }

    //Print render inventory printer
    public function printAllDev($ver)
    {
        $date = Carbon::now();

        $devices = DataDevice::where('DescriptionDevice', 'like', '%impresora%')->get();
        $pdf = PDF::loadView('devices/printAllDev', ['devices' => $devices])->setPaper('CARTA EE. UU.', 'landscape');

        if (($ver) == 1){
            return $pdf->stream('inventario_impresoras_'.$date->toDateTimeString().'.pdf');
        }
        elseif (($ver) == 2){
            return $pdf->download('inventario_impresoras_'.$date->toDateTimeString().'.pdf');
        }

    }

    //Print render inventory printer
    public function printAllDevR($ver)
    {
        $date = Carbon::now();

        $devices = DataDevice::where('DescriptionDevice', 'like', '%red%')->get();
        $pdf = PDF::loadView('devices/printAllDevR', ['devices' => $devices])->setPaper('CARTA EE. UU.', 'landscape');

        if (($ver) == 1){
            return $pdf->stream('inventario_dispositivos_red_'.$date->toDateTimeString().'.pdf');
        }
        elseif (($ver) == 2){
            return $pdf->download('inventario_dispositivos_red_'.$date->toDateTimeString().'.pdf');
        }
    }

    //Update

    public function editDevice($id)
    {
        $devices = DataDevice::findOrFail($id);
        return view('devices/updateDevice')->withDevices($devices);
    }

    public function updateDevice($id)
    {
        $devices = DataDevice::findOrFail($id);

        $this->validate(request(), [
            'InventoryNumberDevice' => 'max:25',
            'NomenclatureDevice' => 'max:50',
            'DescriptionDevice' => 'max:1000',
            'TypeDevice' => 'max:50',
            'BrandDevice' => 'max:50',
            'ModelDevice' => 'max:50',
            'SerialNumberDevice' => 'max:25',
            'ColorDevice' => 'max:50',
            'DescriptionAdDevice' => 'max:50',
            'active' => 'required',

        ]);

        $data = request()->all();
        $devices->fill($data)->save();
        Session::flash('flash_message', 'Device successfully update!');
        return redirect()->route('readDevice');

    }

    //Delete
    public function deleteDevice($id)
    {
        $devices = DataDevice::find($id);
        $devices->delete();
        Session::flash('flash_message', 'Device successfully deleted!');
        return redirect()->route('readDevice');
    }

}
