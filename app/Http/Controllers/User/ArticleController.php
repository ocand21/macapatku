<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vinkla\Hashids\Facades\Hashids;
use App\User;
use App\Article;
use App\Draft;
use App\Category;

use Alert;
use Session;
use Image;
use Auth;
use Storage;


class ArticleController extends Controller
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

    public function index(){
        $id = Auth::user()->id;

        $articles = Article::where('user_id', '=', $id)->orderBy('id', 'desc')->get();

        return view('user.articles.index', compact('articles'));
    }


    public function published()
    {
        $id = Auth::user()->id;

        $articles = Article::where('user_id', '=', $id)->where('acceptable', '=', 1)->orderBy('id', 'desc')->get();

        return view('user.articles.published', compact('articles'));
    }

    

    public function pending(){
      $id = Auth::user()->id;

      $articles = Article::where('user_id', '=', $id)->where('acceptable', '=', 0)->orderBy('id', 'desc')->get();

      return view('user.articles.pending')->withArticles($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('user.articles.create', compact('category'));
    }

    public function storeDraft(Request $request){
      $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,bmp,png',
        'title' => 'required|min:10|max:255',
        'body' => 'required|min:30',
      ]);

      $draft = new Draft;


      $draft->title = $request->input('title');
      $draft->slug = str_slug($request->input('title'));
      $draft->caption = $request->input('caption');
      $draft->body = $request->input('body');
      $draft->user_id = $request->input('user_id');
      $draft->acceptable = 0;

      if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('users/images/articles/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);

        $draft->image = $filename;
      }

      $draft->save();


      Session::flash('flash_message', 'Ditambahkan ke dalam draft!');
      // Alert::success('Berhasil', 'Artikel Ditambahkan ke dalam draft!')->autoclose(5000);

      return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $draft = $request->get('draft', false);
        if ($draft) {
          return $this->storeDraft($request);
        }

        $this->validate($request, [
          'image' => 'required|image|mimes:jpeg,bmp,png',
          'title' => 'required|min:10|max:255',
          'body' => 'required|min:30',
        ]);

        $article = new Article;


        $article->title = $request->input('title');
        $article->slug = str_slug($request->input('title'));
        $article->caption = $request->input('caption');
        $article->category_id = $request->input('category_id');
        $article->body = $request->input('body');
        $article->user_id = $request->input('user_id');
        $article->acceptable = 0;

        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('users/images/articles/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);

          $article->image = $filename;
        }

        $article->save();

        // Alert::success('Artikel telah dibuat!', 'Berhasil')->autoclose(15000);

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
      // $decode_id = Hashids::decode($id);
      $article = Article::with('users')->where('id', $id)->firstOrFail();

      return view('user.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $decode_id = Hashids::decode($id);
        $article = Article::find($id);

        // dd($decode_id);


        return view('user.articles.edit', compact('article', 'decode_id'));
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
        $article = Article::find($id);

        $this->validate($request, [
          'image' => 'image|mimes:jpeg,bmp,png',
          'title' => 'required|min:10|max:255',
          'body' => 'required|min:30',
        ]);

        $article->caption = $request->input('caption');
        $article->title = $request->input('title');
        $article->body = $request->input('body');

        if ($request->hasFile('image')) {
          $image = $request->file('image');
          $filename = time() . '.' . $image->getClientOriginalExtension();
          $location = public_path('users/images/articles/' . $filename);
          Image::make($image)->resize(800, 400)->save($location);


          $oldFilename = $article->image;
          $oldPath = public_path('users/images/articles/' . $oldFilename);

          $article->image = $filename;
          unlink($oldPath);

        }

       $article->save();

       Session::flash('flash_message','Artikel berhasil diperbarui!');

       return redirect()->route('article.show', $article->id);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $oldFilename = $article->image;
        $oldPath = public_path('users/images/articles/' . $oldFilename);

        $article->delete();
        unlink($oldPath);

        // Alert::success('Artikel telah dihapus!', 'Berhasil')->autoclose(15000);
        Session::flash('flash_message','Artikel berhasil dihapus!');
        return redirect()->route('article.published');

    }
}
