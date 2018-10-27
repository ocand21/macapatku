<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Article;
use Session;

class ArticleController extends Controller
{
    public function pending(){
      $articles = Article::with('users')->where('acceptable', 0)->get();

      return view('admin.articles.pending', compact('articles'));
    }

    public function published(){
      $articles = Article::with('users')->where('acceptable', 1)->get();

      return view('admin.articles.published', compact('articles'));
    }

    public function publish(Request $request, $id){
      $article = Article::find($id);

      $this->validate($request, [
        'acceptable' => 'required',
      ]);

      $article->acceptable = $request->input('acceptable');

      $article->save();
      Session::flash('flash_message','Artikel telah diterbitkan');
      return redirect()->route('admin.article.pending');
    }

    public function reject($id){
      $article = Article::find($id);

      $oldFilename = $article->image;
      $oldPath = public_path('users/images/articles/' . $oldFilename);

      $article->delete();
      unlink($oldPath);

      Session::flash('flash_message','Artikel ditolak dan telah dihapus!');
      return redirect()->route('admin.article.pending');
    }
}
