<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Response;

use App\Gallery;
use Image;
use Session;

class GalleryController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
      $this->photos_path = public_path('/admin/images/gallery');
    }

    public function index(){
      $galleries = Gallery::orderBy('id', 'asc')->get();

      return view('admin.gallery.index', compact('galleries'));
    }

    public function create(){
      return view('admin.gallery.create');
    }

    public function upload(Request $request){

        $photos = $request->file('file');

        if (!is_array($photos)) {
            $photos = [$photos];
        }

        if (!is_dir($this->photos_path)) {
            mkdir($this->photos_path, 0777);
        }

        for ($i = 0; $i < count($photos); $i++) {
            $photo = $photos[$i];
            $name = sha1(date('YmdHis') . str_random(30));
            $save_name = $name . '.' . $photo->getClientOriginalExtension();
            $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();

            Image::make($photo)
                ->resize(250, null, function ($constraints) {
                    $constraints->aspectRatio();
                })
                ->save($this->photos_path . '/' . $resize_name);

            $photo->move($this->photos_path, $save_name);

            $upload = new Gallery();
            $upload->filename = $save_name;
            $upload->resized_name = $resize_name;
            $upload->original_name = basename($photo->getClientOriginalName());
            $upload->save();
        }
        return Response::json([
            'message' => 'Image saved Successfully'
        ], 200);
    }

    public function desc(Request $request, $id){
      $image = Gallery::find($id);

      $this->validate($request,[
        'description' => 'sometimes|min:5',
      ]);

      $image->description = $request->input('description');

      $image->save();

      Session::flash('flash_message','Deskripsi telah ditambahkan!');

      return redirect()->route('gallery.index');
    }

    public function delete($id){
      $image = Gallery::find($id);
      $filename = $image->filename;
      $filenamePath = public_path('admin/images/gallery/' . $filename);
      $resize_name = $image->resized_name;
      $resizePath = public_path('admin/images/gallery/' . $resize_name);

      $image->delete();
      unlink($filenamePath);
      unlink($resizePath);

      Session::flash('flash_message','Foto berhasil dihapus!');

      return redirect()->route('gallery.index');
    }

    public function destroy(Request $request){
        $filename = $request->id;
        $uploaded_image = Gallery::where('original_name', basename($filename))->first();

        if (empty($uploaded_image)) {
            return Response::json(['message' => 'Sorry file does not exist'], 400);
        }

        $file_path = $this->photos_path . '/' . $uploaded_image->filename;
        $resized_file = $this->photos_path . '/' . $uploaded_image->resized_name;

        if (file_exists($file_path)) {
            unlink($file_path);
        }

        if (file_exists($resized_file)) {
            unlink($resized_file);
        }

        if (!empty($uploaded_image)) {
            $uploaded_image->delete();
        }

        return Response::json(['message' => 'File successfully delete'], 200);
    }
}
