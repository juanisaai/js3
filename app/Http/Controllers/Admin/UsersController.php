<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    //Create
    /**
     * @var \Illuminate\Routing\Route
     */
    private $route;

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

// ------------------------------------Controllers for Administrator

    public function createAd(){
        return view('Administrator/Admin/createAdmin');
    }

    public function storeAd(){

        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'contact' => 'unique:users,contact|max:10',
            'active' => 'required',
            'type' => 'required|in:Technician,Collaborate,Admin',
            'password' => 'required',
        ]);

        $data = request()->all();
        User::create($data);
        Session::flash('flash_message', '¡Administrador agregado exitosamente!');
        return redirect()->route('readAdmin');
    }


    public function seeAdmin()
    {
        $admins = DB::table('users')->where('type', '=', 'admin')->paginate(10);
        return view('Administrator/Admin/viewAdmin', compact('admins'));
    }

    //Update
    public function editAdmin($id)
    {
        $user = User::findOrFail($id);
        return view('Administrator/Admin/updateAdmin')->withUser($user);
    }

    public function updateAdmin($id)
    {
        $user = User::findOrFail($id);

        $this->validate(request(), [
            'name' => 'required|max:45',
            'username' => 'required|max:15',
            'email' => 'required|unique:users,email,' . $this->route->getParameter('id'),
            'contact' => 'max:10|unique:users,contact,'. $this->route->getParameter('id'),
            'active' => 'required',
            'type' => 'required|in:Technician,Collaborate,Admin',
            'password' => 'max:60',

        ]);

        $data = request()->all();
        $user->fill($data)->save();
        Session::flash('flash_message', '¡Datos de administrador actualizados exitosamente!');
        return redirect()->route('readAdmin');

    }


    //Delete Admin
    public function deleteAdmin($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('flash_message', '¡Administrador eliminado exitosamente!');
        return redirect()->route('readAdmin');
    }


    //------------------------------- Controllers for Users

    public function create(){
        return view('Administrator/Users/createUser');
    }

    public function store(){

        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required|unique:users|max:255',
            'email' => 'unique:users,email|max:255',
            'contact' => 'unique:users,contact|max:10',
            'active' => 'required',
            'type' => 'required|in:Technician,Collaborate,Admin',
            'password' => 'required',
        ]);

        $data = request()->all();
        User::create($data);
        Session::flash('flash_message', '¡Usuario agregado exitosamente!');
        return redirect()->route('readUser');
    }

    //Read
    public function seeUsers()
    {
        $users = DB::table('users')->where('type', '<>', 'admin')->paginate(10);
        return view('Administrator/Users/viewUsers', compact('users'));
    }

    //Update
    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('Administrator/Users/updateUser')->withUser($user);
    }

    public function updateUser($id)
    {
        $user = User::findOrFail($id);

        $this->validate(request(), [
            'name' => 'required|max:45',
            'username' => 'required|max:15',
            'email' => 'required|unique:users,email,' . $this->route->getParameter('id'),
            'contact' => 'max:10|unique:users,contact,'. $this->route->getParameter('id'),
            'active' => 'required',
            'type' => 'required|in:Technician,Collaborate,Admin',
            'password' => 'max:60',

        ]);

        $data = request()->all();
        $user->fill($data)->save();
        Session::flash('flash_message', '¡Datos de usuario actualizados exitosamente!');
        return redirect()->route('readUser');

    }

    //Delete
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('flash_message', '¡Usuario eliminado exitosamente!');
        return redirect()->route('readUser');
    }






}
