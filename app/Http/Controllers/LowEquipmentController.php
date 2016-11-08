<?php

namespace App\Http\Controllers;

use App\Entities\LowInventoryEq;
use Illuminate\Http\Request;

use App\Http\Requests;

class LowEquipmentController extends Controller
{
    public function readEq()
    {
        $lowEquipments = LowInventoryEq::paginate(5);
        return view('lowInventory/equipments/seeLowEquipments', compact('lowEquipments'));
    }
}
