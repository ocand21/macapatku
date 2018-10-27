<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Serat;
use Session;
use Image;
use Auth;

class SeratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kumpulan = Serat::orderBy('created_at', 'asc')->paginate(30);
        // dd($kumpulan);

        return view('admin.serat.index')->withKumpulan($kumpulan); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.serat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,bmp,png',
            'title' => 'required|min:10|max:255',
            'body' => 'required|min:30',
        ]);

      $serat = new Serat;

      $serat->title = $request->input('title');
      $serat->slug = str_slug($request->input('title'));
      $serat->creator = $request->input('creator');
      $serat->body = $request->input('body');

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('admin/images/Serat/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);

        $serat->image = $filename;
      }

      $serat->save();


      Session::flash('flash_message', 'Halaman berhasil dibuat!');

      return redirect()->route('serat.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serat = Serat::find($id);

        return view('admin.serat.show', compact('serat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serat = Serat::find($id);
        // dd($serat);
        // $oldFilename = $serat->image;
        // $oldPath = public_path('admin/images/serat/' . $oldFilename);

        $serat->delete();
        // unlink($oldPath);

        // Alert::success('Artikel telah dihapus!', 'Berhasil')->autoclose(15000);
        Session::flash('flash_message','Serat berhasil dihapus!');
        return redirect()->route('serat.index');
    }
}
