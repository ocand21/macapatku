<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;
use App\Draft;

use Hashids\Hashids;

use Session;
use Image;
use Auth;
use Storage;

class DraftController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $id = Auth::user()->id;
      $drafts = Draft::where('user_id', $id)->orderBy('id', 'desc')->get();
      return view('user.drafts.index', compact('drafts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function publish($id)
    {
        $draft = Draft::find($id);
        return view('user.drafts.publish', compact('draft'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
      $save = $request->get('save', false);
      if ($save) {
        return $this->saveDraft($request);
      }

      $draft = Draft::find($id);

      $this->validate($request, [
        'image' => 'image|mimes:jpeg,bmp,png',
        'title' => 'required|min:10|max:255',
        'body' => 'required|min:30',
      ]);

      $article = new Article;

      $article->title = $request->input('title');
      $article->slug = str_slug($request->input('title'));
      $article->caption = $request->input('caption');
      $article->body = $request->input('body');
      $article->user_id = $request->input('user_id');
      $article->acceptable = 0;

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('users/images/articles/' . $filename);
        $oldFilename = $article->image;
        $oldPath = public_path('users/images/articles/' . $oldFilename);
        Image::make($image)->resize(800, 400)->save($location);

        $article->image = $filename;
        unlink($oldPath);

      } else {
        $article->image = $draft->image;
      }

      $article->save();

      $draft->delete();

      Session::flash('flash_message', 'Artikel berhasil diterbitkan!');

      return redirect()->route('article.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function saveDraft(Request $request, $id)
    {

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
