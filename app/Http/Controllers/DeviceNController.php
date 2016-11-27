<?php

namespace App\Http\Controllers;

use App\Entities\DataDevice;
use Illuminate\Routing\Route;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class DeviceNController extends Controller
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

    //Create
    public function createN(){
        return view('Devices/Network/createDeviceN');
    }

    public function storeN(){

        $this->validate(request(), [
            'InventoryNumberDevice' => 'max:50|unique:dataDevices,InventoryNumberDevice',
            'NomenclatureDevice' => 'max:50|unique:dataDevices,NomenclatureDevice',
            'DescriptionDevice' => 'max:3|in:Red',
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
        Session::flash('flash_message', '¡Dispositivo de red agregado exitosamente!');
        return redirect()->route('readDeviceN');
    }

    //Read
    public function seeDevicesN()
    {
        $devices = DataDevice::where('DescriptionDevice', '=', 'Red')->paginate(10);
        return view('Devices/Network/viewDevicesN', compact('devices'));
    }

    public function seeDetailN($id)
    {
        $device = DataDevice::findOrFail($id);
        return view('Devices/Network/viewDetailsDeviceN', compact('device'));
    }


    //Print render inventory networks
    public function printAllDevN($ver)
    {
        $date = Carbon::now();

        $devices = DataDevice::where('DescriptionDevice', '=', 'Red')->get();
        $pdf = PDF::loadView('Devices/Network/printAllDevN', ['devices' => $devices])->setPaper('CARTA EE. UU.', 'landscape');

        if (($ver) == 1){
            return $pdf->stream('inventario_dispositivos_red_'.$date->toDateTimeString().'.pdf');
        }
        elseif (($ver) == 2){
            return $pdf->download('inventario_dispositivos_red_'.$date->toDateTimeString().'.pdf');
        }
    }

    //Update

    public function editDeviceN($id)
    {
        $devices = DataDevice::findOrFail($id);
        return view('Devices/Network/updateDeviceN')->withDevices($devices);
    }

    public function updateDeviceN($id)
    {
        $devices = DataDevice::findOrFail($id);

        $this->validate(request(), [
            'InventoryNumberDevice' => 'max:25|unique:dataDevices,InventoryNumberDevice,' . $this->route->getParameter('id'),
            'NomenclatureDevice' => 'max:50|unique:dataDevices,NomenclatureDevice,' . $this->route->getParameter('id'),
            'DescriptionDevice' => 'max:3|in:Red',
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
        Session::flash('flash_message', '¡Dispositivo de red actualizado exitosamente!');
        return redirect()->route('readDeviceN');

    }

    //Delete
    public function deleteDeviceN($id)
    {
        $devices = DataDevice::find($id);
        $devices->delete();
        Session::flash('flash_message', '¡Dispositivo de red eliminado exitosamente!');
        return redirect()->route('readDeviceN');
    }



}
