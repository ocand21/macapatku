<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector\Intented;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm(){
      return view('auth.admin-login');
    }

    public function login(Request $request){
      // Validasi Data
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Coba Login User

      if (Auth::guard('admin')->attempt([
        'email' => $request->email,
        'password' => $request->password,], $request->remember)) {

        // Kondisi Jika Sukses
        return redirect()->intended(route('admin.dashboard'));
      }

      // Kondisi Jika Gagal
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
