<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\News;
use Session;
use Image;
use Auth;
use Storage;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
      $this->middleware('auth:admin');
    }

    public function index()
    {
        $news = News::orderBy('id', 'desc')->paginate(10);

        return view('admin.news.index', compact('news'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
        'image' => 'required|image|mimes:jpeg,bmp,png',
        'title' => 'required|min:10|max:255',
        'body' => 'required|min:30',
      ]);

      $news = new News;

      $news->title = $request->input('title');
      $news->slug = str_slug($request->input('title'));
      $news->caption = $request->input('caption');
      $news->body = $request->input('body');

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('admin/images/news/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);

        $news->image = $filename;
      }

      $news->save();

      Session::flash('flash_message', 'Halaman berhasil dibuat!');

      return redirect()->route('news.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $news = News::find($id);

      return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $news = News::find($id);

          return view('admin.news.edit', compact('news'));
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
        $news = News::find($id);

        $this->validate($request, [
          'image' => 'sometimes|image|mimes:jpeg,bmp,png',
          'title' => 'required|min:10|max:255',
          'body' => 'required|min:30',
        ]);

        $news->caption = $request->input('caption');
        $news->title = $request->input('title');
        $news->body = $request->input('body');

        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('admin/images/news/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);


          $oldFilename = $news->image;
          $oldPath = public_path('admin/images/news/' . $oldFilename);

          $news->image = $filename;
          unlink($oldPath);

        }

        $news->save();

        Session::flash('flash_message','Halaman berhasil diperbarui!');

        return redirect()->route('news.show', $news->id);
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
