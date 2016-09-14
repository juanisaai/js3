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
        $suppliers = Supplier::lists('NameSupplier', 'id');
        return view('devices/createDevice', compact('suppliers'));
    }

    public function store(){

        $this->validate(request(), [
            'TypeDevice' => 'required|max:50',
            'BrandDevice' => 'max:50',
            'ModelDevice' => 'max:50',
            'ColorDevice' => 'max:50',
            'NomenclatureDevice' => 'max:50',
            'SerialNumberDevice' => 'max:25',
            'InventoryNumberDevice' => 'max:25',
            'supplier_id' => 'required'
        ]);

        $data = request()->all();
        DataDevice::create($data);
        Session::flash('flash_message', 'Device successfully added!');
        return redirect()->route('readDevice');
    }

    //Read
    public function seeDevices()
    {
        $devices = DataDevice::paginate(4);
        return view('devices/viewDevices', compact('devices'));
    }

    //Update

    public function editDevice($id)
    {
        $suppliers = Supplier::lists('NameSupplier', 'id');
        $devices = DataDevice::findOrFail($id);
        return view('devices/updateDevice')->withDevices($devices)->withSuppliers($suppliers);
    }

    public function updateDevice($id)
    {
        $devices = DataDevice::findOrFail($id);

        $this->validate(request(), [
            'TypeDevice' => 'required|max:50',
            'BrandDevice' => 'max:50',
            'ModelDevice' => 'max:50',
            'ColorDevice' => 'max:50',
            'NomenclatureDevice' => 'max:50',
            'SerialNumberDevice' => 'max:25',
            'InventoryNumberDevice' => 'max:25',
            'supplier_id' => 'required'

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
