<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Article;
use Session;

class CommentController extends Controller
{
    public function store(Request $request, $id){
      $this->validate($request, [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'comment' => 'required|min:10',
      ]);

      $article = Article::find($id);

      $comment = new Comment;

      $comment->name = $request->input('name');
      $comment->email = $request->input('email');
      $comment->comment = $request->input('comment');
      $comment->article_id = $article->id;

      $comment->save();

      Session::flash('flash_message', 'Komentar Berhasil!');

      return redirect()->route('article.single', [$article->slug]);
    }
}
