<?php

namespace App\Http\Controllers;

use App\Entities\Area;
use Illuminate\Http\Request;

use App\Http\Requests;

class AreaController extends Controller
{
    public function seeAreas()
    {
        $areas = Area::paginate(4);
        return view('areas/viewAreas', compact('areas'));
    }

    public function create(){
        return view('areas/createArea');
    }

    public function store(){

        $this->validate(request(), [
            'NameArea' => ['required' ,'max:50'],
            'UnitArea' => ['max:50'],
            'ExtensionArea' => ['max:50'],
            'DirectorateArea' => ['max:150']

        ]);

        $data = request()->all();

        Area::create($data);

        return redirect()->to('/areas');

    }
}
