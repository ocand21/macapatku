<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Files;
use Storage;
use Session;

class FileController extends Controller
{

    public function index(){
      $files = Files::orderBy('created_at', 'desc')->paginate(30);

      return view('user.files.index', compact('files'));
    }

    public function form(){
      return view('user.files.create');
    }

    public function upload(Request $request){
      $this->validate($request, [
        'title' => 'nullable|max:100',
        'file' => 'required|file|max:2000',
      ]);

      $uploadedFile = $request->file('file');

      $path = $uploadedFile->store('public/files');

      $file = Files::create([
        'title' => $request->title ?? $uploadedFile->getClientOriginalName(),
        'filename' => $path
      ]);

      Session::flash('flash_message', 'Berkas berhasil diupload!');

      return redirect()->route('file.index');
    }

    public function destroy($id){
      $file = Files::find($id);

      Storage::delete($file->filename);

      $file->delete();
      Session::flash('flash_message', 'Berkas berhasil dihapus!');

      return redirect()->back();

    }

}
