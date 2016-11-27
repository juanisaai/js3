<?php

namespace App\Http\Controllers;

use App\Entities\DataDevice;
use Illuminate\Routing\Route;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class DeviceController extends Controller
{
    //Create
    /** |unique:users,email,' . $this->route->getParameter('id'),
     * @var \Illuminate\Routing\Route
     */
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    // ---------------------------- Controllers for printers

    //Create
    public function create(){
        return view('Devices/Printers/createDevice');
    }

    public function store(){

        $this->validate(request(), [
            'InventoryNumberDevice' => 'max:50|unique:dataDevices,InventoryNumberDevice',
            'NomenclatureDevice' => 'max:50|unique:dataDevices,NomenclatureDevice',
            'DescriptionDevice' => 'max:9|in:Impresora',
            'TypeDevice' => 'required|max:50',
            'BrandDevice' => 'required|max:50',
            'ModelDevice' => 'required|max:50',
            'SerialNumberDevice' => 'required|max:25|unique:dataDevices,SerialNumberDevice',
            'ColorDevice' => 'required|max:50',
            'DescriptionAdDevice' => 'max:50',
            'active' => 'required',

        ]);

        $data = request()->all();
        DataDevice::create($data);
        Session::flash('flash_message', '¡Impresora agregada exitosamente!');
        return redirect()->route('readDevice');
    }

    //Read
    public function seeDevices()
    {
        $devices = DataDevice::where('DescriptionDevice', '=', 'Impresora')->paginate(10);
        return view('Devices/Printers/viewDevices', compact('devices'));
    }

    public function seeDetail($id)
    {
        $device = DataDevice::findOrFail($id);
        return view('Devices/Printers/viewDetailsDevice', compact('device'));
    }

    //Print render inventory printer
    public function printAllDev($ver)
    {
        $date = Carbon::now();

        $devices = DataDevice::where('DescriptionDevice', 'like', '%impresora%')->get();
        $pdf = PDF::loadView('Devices/Printers/printAllDev', ['devices' => $devices])->setPaper('CARTA EE. UU.', 'landscape');

        if (($ver) == 1){
            return $pdf->stream('inventario_impresoras_'.$date->toDateTimeString().'.pdf');
        }
        elseif (($ver) == 2){
            return $pdf->download('inventario_impresoras_'.$date->toDateTimeString().'.pdf');
        }

    }


    //Update

    public function editDevice($id)
    {
        $devices = DataDevice::findOrFail($id);
        return view('Devices/Printers/updateDevice')->withDevices($devices);
    }

    public function updateDevice($id)
    {
        $devices = DataDevice::findOrFail($id);

        $this->validate(request(), [
            'InventoryNumberDevice' => 'max:25|unique:dataDevices,InventoryNumberDevice,' . $this->route->getParameter('id'),
            'NomenclatureDevice' => 'max:50|unique:dataDevices,NomenclatureDevice,' . $this->route->getParameter('id'),
            'DescriptionDevice' => 'max:9|in:Impresora',
            'TypeDevice' => 'required|max:50',
            'BrandDevice' => 'required|max:50',
            'ModelDevice' => 'required|max:50',
            'SerialNumberDevice' => 'required|max:25|unique:dataDevices,SerialNumberDevice,' . $this->route->getParameter('id'),
            'ColorDevice' => 'required|max:50',
            'DescriptionAdDevice' => 'max:50',
            'active' => 'required',


        ]);

        $data = request()->all();
        $devices->fill($data)->save();
        Session::flash('flash_message', '¡Impresora actualizada exitosamente!');
        return redirect()->route('readDevice');

    }

    //Delete
    public function deleteDevice($id)
    {
        $devices = DataDevice::find($id);
        $devices->delete();
        Session::flash('flash_message', '¡Impresora eliminada exitosamente!');
        return redirect()->route('readDevice');
    }


    // ---------------------------- Controllers for networks



}
