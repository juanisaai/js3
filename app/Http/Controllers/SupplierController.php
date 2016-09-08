<?php

namespace App\Http\Controllers;

use App\Entities\Supplier;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{

    //Create
    public function create(){
        return view('suppliers/createSupplier');
    }

    public function store(){

        $this->validate(request(), [
            'NameSupplier' => 'required|max:50',

        ]);

        $data = request()->all();
        Supplier::create($data);
        Session::flash('flash_message', 'Supplier successfully added!');
        return redirect()->route('readSupplier');


    }

    //Read
    public function seeSuppliers()
    {
        $suppliers = Supplier::paginate(4);
        return view('suppliers/viewSuppliers', compact('suppliers'));
    }

    //Update

    public function editSupplier($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers/updateSupplier')->withSupplier($supplier);
    }

    public function updateSupplier($id)
    {
        $supplier = Supplier::findOrFail($id);

        $this->validate(request(), [
            'NameSupplier' => 'required',

        ]);

        $data = request()->all();
        $supplier->fill($data)->save();
        Session::flash('flash_message', 'Supplier successfully update!');
        return redirect()->route('readSupplier');

    }

    //Delete
    public function deleteSupplier($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        Session::flash('flash_message', 'Supplier successfully deleted!');
        return redirect()->route('readSupplier');
    }



}
