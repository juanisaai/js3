<?php

namespace App\Http\Controllers;

use App\Entities\DataEquipment;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;

class EquipmentsController extends Controller
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
    public function create(){
        return view('Equipments/createEquipment');
    }

    public function store(){

        $this->validate(request(), array(
            'InventoryNumberEquipment' => 'max:50|unique:dataEquipments,InventoryNumberEquipment',
            'NomenclatureEquipment' => 'max:50|unique:dataEquipments,NomenclatureEquipment',
            'DescriptionEquipment' => 'required|in:CPU,Laptop,Monitor,NoBreak,CurrentRegulator',
            'BrandEquipment' => 'required|max:50',
            'ModelEquipment' => 'required|max:50',
            'SerialNumberEquipment' => 'max:25|unique:dataEquipments,SerialNumberEquipment',
            'ColorEquipment' => 'required|max:15',
            'DescriptionAdEquipment' => 'max:1000',
            //View Details
            'TypeAssemblyEquipment' => 'required|in:Assembly,Manufacture',
            'EquipmentOS' => 'required|max:40',
            'ArchitectureOS' => 'max:15',
            'DistributionOS' => 'required|max:40',
            'SerialNumberOS' => 'max:25',
            'InventoryNumberOS' => 'max:30',
            'IPAddressEquipment' => 'max:50|unique:dataEquipments,IPAddressEquipment',
            'BrandMotherB' => 'max:50',
            'ModelMotherB' => 'max:50',
            'SerialNumberMotherB' => 'max:50|unique:dataEquipments,SerialNumberMotherB',
            'BrandCPU' => 'required|max:50',
            'ModelCPU' => 'required|max:50',
            'FrequencyCPU' => 'required|max:30',
            'BrandRam' => 'max:50',
            'TypeRam' => 'max:50',
            'CapabilityRam' => 'required|max:30',
            'TypeHHD' => 'max:50',
            'BrandHHD' => 'max:50',
            'ModelHHD' => 'max:50',
            'CapabilityHHD' => 'required|max:25',
            'SerialNumberHHD' => 'max:50|unique:dataEquipments,SerialNumberHHD',
            'BrandDiscReader' => 'max:50',
            'TypeDiscReader' => 'max:25',
        ));

        $data = request()->all();
        DataEquipment::create($data);
        Session::flash('flash_message', '¡Equipo agregado exitosamente!');
        return redirect()->route('readEquipments');

    }

    //Read
    public function seeEquipments()
    {
        $equipments = DataEquipment::paginate(10);
        return view('Equipments/viewEquipments', compact('equipments'));
    }

    public function show($equipment){

        $equipment = DataEquipment::findOrFail($equipment);

        return view('Equipments/viewDetailsEquipment', compact('equipment'));
    }

    //Print render inventory printer
    public function printAllEq($ver)
    {
        $date = Carbon::now();
        $equipments = DataEquipment::all();
        $pdf = PDF::loadView('Equipments/printAllEq', ['equipments' => $equipments])->setPaper('CARTA EE. UU.', 'landscape');

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
        return view('Equipments/updateEquipment')->withEquipment($equipment);
    }

    public function updateEquipment($id)
    {
        $equipment = DataEquipment::findOrFail($id);

        $this->validate(request(), [
            'InventoryNumberEquipment' => 'max:50|unique:dataEquipments,InventoryNumberEquipment,' . $this->route->getParameter('id'),
            'NomenclatureEquipment' => 'max:50|unique:dataEquipments,NomenclatureEquipment,' . $this->route->getParameter('id'),
            'DescriptionEquipment' => 'required|in:CPU,Laptop,Monitor,NoBreak,CurrentRegulator',
            'BrandEquipment' => 'required|max:50',
            'ModelEquipment' => 'required|max:50',
            'SerialNumberEquipment' => 'max:25|unique:dataEquipments,SerialNumberEquipment,' . $this->route->getParameter('id'),
            'ColorEquipment' => 'max:15',
            'DescriptionAdEquipment' => 'max:1000',
            //View Details
            'TypeAssemblyEquipment' => 'required|in:Assembly,Manufacture',
            'EquipmentOS' => 'required|max:40',
            'ArchitectureOS' => 'max:15',
            'DistributionOS' => 'required|max:40',
            'SerialNumberOS' => 'max:25',
            'InventoryNumberOS' => 'max:30',
            'IPAddressEquipment' => 'max:50|unique:dataEquipments,IPAddressEquipment,' . $this->route->getParameter('id'),
            'BrandMotherB' => 'max:50',
            'ModelMotherB' => 'max:50',
            'SerialNumberMotherB' => 'max:50|unique:dataEquipments,SerialNumberMotherB,' . $this->route->getParameter('id'),
            'BrandCPU' => 'required|max:50',
            'ModelCPU' => 'required|max:50',
            'FrequencyCPU' => 'required|max:30',
            'BrandRam' => 'max:50',
            'TypeRam' => 'max:50',
            'CapabilityRam' => 'required|max:30',
            'TypeHHD' => 'max:50',
            'BrandHHD' => 'max:50',
            'ModelHHD' => 'max:50',
            'CapabilityHHD' => 'required|max:25',
            'SerialNumberHHD' => 'max:50|unique:dataEquipments,SerialNumberHHD,' . $this->route->getParameter('id'),
            'BrandDiscReader' => 'max:50',
            'TypeDiscReader' => 'max:25',
        ]);

        $data = request()->all();
        $equipment->fill($data)->save();
        Session::flash('flash_message', '¡Equipo actualizado exitosamente!');
        return redirect()->route('readEquipments');

    }

    //Delete
    public function deleteEquipment($id)
    {
        $equipment = DataEquipment::find($id);
        $equipment->delete();
        Session::flash('flash_message', '¡Equipo eliminado exitosamente!');
        return redirect()->route('readEquipments');
    }
}
