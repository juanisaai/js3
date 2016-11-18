<?php

namespace App\Http\Controllers;

use App\Entities\DataEquipment;
use App\Entities\Supplier;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class EquipmentsController extends Controller
{
    //Create
    public function create(){
        return view('equipments/createEquipment');
    }

    public function store(){

        $this->validate(request(), array(
            'InventoryNumberEquipment' => 'max:25',
            'NomenclatureEquipment' => 'max:20',
            'DescriptionEquipment' => 'max:1000',
            'BrandEquipment' => 'max:15',
            'ModelEquipment' => 'max:25',
            'SerialNumberEquipment' => 'max:15',
            'ColorEquipment' => 'max:15',
            'DescriptionAdEquipment' => 'max:1000',
            //View Details
            'TypeEquipment' => 'required|max:15',
            'TypeAssemblyEquipment' => 'max:15',
            'EquipmentSO' => '40',
            'ArchitectureOS' => '15',
            'DistributionOS' => '40',
            'SerialNumberOS' => '25',
            'InventoryNumberOS' => '30',
            'IPAddressEquipment' => 'max:25',
            'BrandMotherB' => 'max:50',
            'ModelMotherB' => 'max:50',
            'SerialNumberMotherB' => 'max:50',
            'BrandCPU' => 'max:50',
            'ModelCPU' => 'max:50',
            'FrequencyCPU' => 'max:30',
            'BrandRam' => 'max:50',
            'TypeRam' => 'max:50',
            'CapabilityRam' => 'max:30',
            'TypeHHD' => 'max:50',
            'BrandHHD' => 'max:50',
            'ModelHHD' => 'max:50',
            'CapabilityHHD' => 'max:25',
            'SerialNumberHHD' => 'max:50',
            'BrandDiscReader' => 'max:50',
            'TypeDiscReader' => 'max:25',
        ));

        $data = request()->all();
        DataEquipment::create($data);
        Session::flash('flash_message', 'Equipment successfully added!');
        return redirect()->route('readEquipments');

    }

    //Read
    public function seeEquipments()
    {
        $equipments = DataEquipment::paginate(10);
        return view('equipments/viewEquipments', compact('equipments'));
    }

    public function show($equipment){

        $equipment = DataEquipment::findOrFail($equipment);

        return view('equipments/viewDetailsEquipment', compact('equipment'));
    }

    //Print render inventory printer
    public function printAllEq($ver)
    {
        $date = Carbon::now();
        $equipments = DataEquipment::all();
        $pdf = PDF::loadView('equipments/printAllEq', ['equipments' => $equipments])->setPaper('CARTA EE. UU.', 'landscape');

        if (($ver) == 1){
            return $pdf->stream('inventario_equipos_'.$date->toDateTimeString().'.pdf');
        }
        elseif (($ver) == 2){
            return $pdf->download('inventario_equipos_'.$date->toDateTimeString().'.pdf');
        }
    }

    //Update

    public function editEquipment($id)
    {
        $equipment = DataEquipment::findOrFail($id);
        return view('equipments/updateEquipment')->withEquipment($equipment);
    }

    public function updateEquipment($id)
    {
        $equipment = DataEquipment::findOrFail($id);

        $this->validate(request(), [
            'InventoryNumberEquipment' => 'max:25',
            'NomenclatureEquipment' => 'max:20',
            'DescriptionEquipment' => 'max:1000',
            'BrandEquipment' => 'max:15',
            'ModelEquipment' => 'max:25',
            'SerialNumberEquipment' => 'max:15',
            'ColorEquipment' => 'max:15',
            'DescriptionAdEquipment' => 'max:1000',
            //View Details
            'TypeEquipment' => 'required|max:15',
            'TypeAssemblyEquipment' => 'max:15',
            'EquipmentSO' => '40',
            'ArchitectureOS' => '15',
            'DistributionOS' => '40',
            'SerialNumberOS' => '25',
            'InventoryNumberOS' => '30',
            'IPAddressEquipment' => 'max:25',
            'BrandMotherB' => 'max:50',
            'ModelMotherB' => 'max:50',
            'SerialNumberMotherB' => 'max:50',
            'BrandCPU' => 'max:50',
            'ModelCPU' => 'max:50',
            'FrequencyCPU' => 'max:30',
            'BrandRam' => 'max:50',
            'TypeRam' => 'max:50',
            'CapabilityRam' => 'max:30',
            'TypeHHD' => 'max:50',
            'BrandHHD' => 'max:50',
            'ModelHHD' => 'max:50',
            'CapabilityHHD' => 'max:25',
            'SerialNumberHHD' => 'max:50',
            'BrandDiscReader' => 'max:50',
            'TypeDiscReader' => 'max:25',
        ]);

        $data = request()->all();
        $equipment->fill($data)->save();
        Session::flash('flash_message', 'Equipment successfully update!');
        return redirect()->route('readEquipments');

    }

    //Delete
    public function deleteEquipment($id)
    {
        $equipment = DataEquipment::find($id);
        $equipment->delete();
        Session::flash('flash_message', 'Equipment successfully deleted!');
        return redirect()->route('readEquipments');
    }
}
