<?php

namespace App\Http\Controllers;

use App\Entities\DataEquipment;
use App\Entities\LowInventoryEq;
use Illuminate\Http\Request;

use App\Http\Requests;

class LowEquipmentController extends Controller
{
    // Create new low equipment
    public function createEq()
    {
        $equipments = DataEquipment::lists('name_equipment', 'id');
        return view('lowInventory/equipments/createLowEquipments', compact('equipments'));
    }

    // Read all low equipment
    public function readEq()
    {
        $lowEquipments = LowInventoryEq::paginate(5);
        return view('lowInventory/equipments/seeLowEquipments', compact('lowEquipments'));
    }
}
