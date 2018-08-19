<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;


class AppController extends Controller
{
    public function index(){
      $articles = Article::where('acceptable', 0)->orderBy('id', 'desc')->get();
      $newArticle = Article::where('acceptable', 0)->orderBy('id', 'desc')->first();

      return view('public.home', compact('articles', 'newArticle'));
    }

    public function single($slug){
      $article = Article::with('users')->where('slug', '=', $slug)->first();

      return view('public.single', compact('article'));
    }
}
