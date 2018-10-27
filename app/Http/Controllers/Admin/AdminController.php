<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin;
use App\Role;
use Session;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index(){
      $admins = Admin::orderBy('id', 'asc')->get();
      return view('admin.staff.index', compact('admins'));
    }

    public function create(){
      return view('admin.staff.create');
    }

    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:admins',
        'phone' => 'required|max:12|string|unique:admins',
        'password' => 'required|string|min:6|confirmed',
      ]);

      $name = $request->input('name');
      $email = $request->input('email');
      $phone = $request->input('phone');
      $password = $request->input('password');

      $admin = Admin::create([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'password' => bcrypt($password),
      ]);
      $admin
      ->roles()
      ->attach(Role::where('name', 'staf')->first());

      $admin->save();

      Session::flash('flash_message','Staf berhasil didaftarkan');

      return redirect()->route('admin.staff');
    }

    public function destroy(){
      
    }
}
