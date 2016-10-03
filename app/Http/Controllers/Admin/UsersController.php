<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
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

    public function create(){
        return view('management/createUser');
    }

    public function store(){

        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'active' => 'required',
            'type' => 'required|in:User,Admin',
            'password' => 'required',
        ]);

        $data = request()->all();
        User::create($data);
        Session::flash('flash_message', 'User successfully added!');
        return redirect()->route('readUser');
    }

    //Read
    public function seeUsers()
    {
        $users = DB::table('users')->where('username', '<>', 'juanisai')->get();
        return view('management/viewUsers', compact('users'));
    } //DB::table('users')->where('type', '<>', 'admin')->get();

    //Update

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('management/updateUser')->withUser($user);
    }

    public function __construct(Route $route)
    {
        $this->route = $route;
    }

    public function updateUser($id)
    {
        //dd($this->route->getParameter('id'));

        $user = User::findOrFail($id);

        $this->validate(request(), [
            'name' => 'required|max:45',
            'username' => 'required|max:15',
            'email' => 'required|unique:users,email,' . $this->route->getParameter('id'),
            'active' => 'required',
            'type' => 'required|in:User,Admin',
            'password' => 'max:60',

        ]);

        $data = request()->all();
        $user->fill($data)->save();
        Session::flash('flash_message', 'User successfully update!');
        return redirect()->route('readUser');

    }

    //Delete
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('flash_message', 'User successfully deleted!');
        return redirect()->route('readUser');
    }



}
