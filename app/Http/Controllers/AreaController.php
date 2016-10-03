<?php

namespace App\Http\Controllers;

use App\Entities\Area;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;

class AreaController extends Controller
{

    //Create
    /**
     * @var \Illuminate\Routing\Route
     */
    private $route;

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
        return redirect()->route('readArea');

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

    public function __construct(Route $route)
    {
        $this-> route = $route;
    }

    public function updateArea($id)
    {
        $area = Area::findOrFail($id);

        $this->validate(request(), [
            'NameArea' => 'required|max:50|unique:areas,NameArea,' . $this->route->getParameter('id'),
            'UnitArea' => 'max:50',
            'ExtensionArea' => 'max:50',
            'DirectorateArea' => 'max:150'

        ]);

        $data = request()->all();
        $area->fill($data)->save();
        Session::flash('flash_message', 'Area successfully update!');
        return redirect()->route('readArea');

    }

    //Delete
    public function deleteArea($id)
    {
        $area = Area::find($id);
        $area->delete();
        Session::flash('flash_message', 'Area successfully deleted!');
        return redirect()->route('readArea');


    }


}
