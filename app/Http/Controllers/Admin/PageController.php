<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Page;
use Session;
use Image;
use Auth;
use Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('created_at', 'asc')->paginate(30);
        // dd($pages);

        return view('admin.pages.index')->withPages($pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
        'image' => 'sometimes|image|mimes:jpeg,bmp,png',
        'title' => 'required|min:10|max:255',
        'body' => 'required|min:30',
      ]);

      $page = new Page;

      $page->title = $request->input('title');
      $page->slug = str_slug($request->input('title'));
      $page->caption = $request->input('caption');
      $page->body = $request->input('body');

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('admin/images/pages/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);

        $page->image = $filename;
      }

      $page->save();


      Session::flash('flash_message', 'Halaman berhasil dibuat!');

      return redirect()->route('pages.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);

        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);

        return view('admin.pages.edit', compact('page'));
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
        $page = Page::find($id);

        $this->validate($request, [
          'image' => 'sometimes|image|mimes:jpeg,bmp,png',
          'title' => 'required|min:10|max:255',
          'body' => 'required|min:30',
        ]);

        $page->caption = $request->input('caption');
        $page->title = $request->input('title');
        $page->body = $request->input('body');

        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('admin/images/pages/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);


          $oldFilename = $page->image;
          $oldPath = public_path('admin/images/pages/' . $oldFilename);

          $page->image = $filename;
          unlink($oldPath);

        }

        $page->save();

        Session::flash('flash_message','Halaman berhasil diperbarui!');

        return redirect()->route('pages.show', $page->id);

    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
