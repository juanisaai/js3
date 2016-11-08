<?php

namespace App\Http\Controllers;

use App\Entities\LowInventoryDev;
use Illuminate\Http\Request;

use App\Http\Requests;

class LowDeviceController extends Controller
{
    public function readDev()
    {
        $lowDevices = LowInventoryDev::paginate(5);
        return view('lowInventory/devices/seeLowDevices', compact('lowDevices'));
    }
}
