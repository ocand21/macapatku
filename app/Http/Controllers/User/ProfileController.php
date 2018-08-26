<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\User;
use Auth;
use Image;
use Session;

class ProfileController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function myProfile(){
      return view('user.profile.myprofile');
    }

    public function showEditForm(){
      return view('user.profile.edit');
    }

    public function editProfile(Request $request){
      $id = Auth::user()->id;
      $user = User::find($id);

      if ($request->input('email') == $user->email) {
        $this->validate($request, [
          'name' => 'required|min:3|max:255',
          'address' => 'required|min:5',
          'phone' => 'required|unique:users',
        ]);
      } else if ($request->input('phone') == $user->phone) {
        $this->validate($request, [
          'name' => 'required|min:3|max:255',
          'address' => 'required|min:5',
        ]);
      } else {
        $this->validate($request, [
          'name' => 'required|min:3|max:255',
          'email' => 'required|min:10|email|unique:users',
          'address' => 'required|min:5',
          'phone' => 'required|unique:users',
          'aboutme' => 'min:10',
        ]);
      }

      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->aboutme = $request->input('aboutme');

      $user->save();

      Session::flash('flash_message','Profil Berhasil Diperbaharui');

       return redirect()->route('myprofile');
    }

    public function uploadPicture(Request $request){
      $id = Auth::user()->id;
      $user = User::find($id);

      $this->validate($request, [
        'picture' => 'required|image|mimes:jpeg,bmp,png',
      ]);

      if ($request->hasFile('picture')) {
        $picture = $request->file('picture');
        $filename = $user->name . '.' . $picture->getClientOriginalExtension();
        $location = public_path('users/images/avatar/' . $filename);
        Image::make($picture)->resize(192, 192)->save($location);

        $user->picture = $filename;
      }

      $user->save();

      Session::flash('flash_message', 'Foto profil berhasil diubah');

      return redirect()->route('myprofile');
    }
}
