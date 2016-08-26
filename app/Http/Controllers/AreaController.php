<?php

namespace App\Http\Controllers;

use App\Entities\Area;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AreaController extends Controller
{

    /*
     * CRUD Areas
     * */

    //Create
    public function create(){
        return view('areas/createArea');
    }

    public function store(){

        $this->validate(request(), [
            'NameArea' => 'required|max:50|unique:areas',
            'UnitArea' => 'max:50',
            'ExtensionArea' => 'max:50',
            'DirectorateArea' => 'max:150'

        ]);

        $data = request()->all();
        Area::create($data);
        Session::flash('flash_message', 'Area successfully added!');
        return redirect()->to('/areas');

    }

    //Read
    public function seeAreas()
    {
        $areas = Area::paginate(4);
        return view('areas/viewAreas', compact('areas'));
    }

    //Update

    public function editArea($id)
    {
        $area = Area::findOrFail($id);
        return view('areas/updateArea')->withArea($area);
    }

    public function updateArea($id)
    {
        $area = Area::findOrFail($id);

        $this->validate(request(), [
            'NameArea' => 'required|max:50',
            'UnitArea' => 'max:50',
            'ExtensionArea' => 'max:50',
            'DirectorateArea' => 'max:150'

        ]);

        $data = request()->all();
        $area->fill($data)->save();
        Session::flash('flash_message', 'Area successfully update!');
        return redirect()->to('/areas');

    }

    //Delete
    public function deleteArea($id)
    {
        $area = Area::find($id);
        $area->delete();
        Session::flash('flash_message', 'Area successfully deleted!');
        return redirect()->to('/areas');


    }


}
