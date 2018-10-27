<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Admin;
use Auth;
use Session;
use Image;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
  public function myProfile(){
    return view('admin.profile.myprofile');
  }

  public function edit(){
    return view('admin.profile.edit');
  }

  public function storeEdit(Request $request){
    $id = Auth::guard('admin')->user()->id;
    $admin = Admin::find($id);

    if ($request->input('email') == $admin->email) {
      $this->validate($request, [
        'name' => 'required|min:3|max:255',
        'phone' => 'required|unique:users',
      ]);
    } else if ($request->input('phone') == $admin->phone) {
      $this->validate($request, [
        'name' => 'required|min:3|max:255',
      ]);
    } else {
      $this->validate($request, [
        'name' => 'required|min:3|max:255',
        'email' => 'required|min:10|email|unique:admins',
        'phone' => 'required|unique:admins',
      ]);
    }

    $admin->name = $request->input('name');
    $admin->email = $request->input('email');
    $admin->phone = $request->input('phone');

    $admin->save();


    Session::flash('flash_message','Profil Berhasil Diperbaharui');

    return redirect()->route('admin.profile');

  }

  public function changePicture(Request $request){
    $id = Auth::guard('admin')->user()->id;
    $admin = Admin::find($id);

    $this->validate($request, [
      'picture' => 'required|image|mimes:jpeg,bmp,png',
    ]);

    if ($request->hasFile('picture')) {
      $picture = $request->file('picture');
      $filename = $admin->name . '.' . $picture->getClientOriginalExtension();
      $location = public_path('admin/images/avatar/' . $filename);
      Image::make($picture)->resize(192, 192)->save($location);

      $admin->picture = $filename;
    }

    $admin->save();

    Session::flash('flash_message', 'Foto profil berhasil diubah');

    return redirect()->route('admin.profile');
  }

  public function getChangePasswordForm(){
    return view('admin.profile.changepassword');
  }

  public function changePassword(Request $request){
    if (!(Hash::check($request->get('current_password'), Auth::guard('admin')->user()->password))) {
      Session::flash('flash_error','Password lama yang Anda masukkan salah. Silakan coba lagi');
      return redirect()->back();
    }
    if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
      Session::flash('flash_error','Password baru tidak boleh sama dengan password lama. Silakan coba lagi');
      return redirect()->back();
    }

    $validatedData = $request->validate([
      'current_password' => 'required',
      'new_password' => 'required|string|min:6|confirmed',
    ]);

    $admin = Auth::guard('admin')->user();
    $admin->password = bcrypt($request->get('new_password'));
    $admin->save();

    Session::flash('flash_message','Password berhasil diubah. Silakan login ulang');
    return redirect()->back();
  }

}
