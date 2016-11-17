<?php

namespace App\Http\Controllers;

use App\Entities\DataDevice;
use App\Entities\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
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
