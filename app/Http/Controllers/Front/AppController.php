<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;
use App\News;
use App\Serat;

use Session;

class AppController extends Controller
{
    public function index(){
      $articles = Article::with('users')->where('acceptable', 1)->orderBy('id', 'desc')->limit(10)->get();
      $news = News::orderBy('id', 'desc')->limit(3)->get();
      $users = User::limit(3)->get();
      
      $popularArticles = Article::with('comments')->where('acceptable', 1)->orderBy('view_count', 'asc')->limit(3)->get();
      $popularNews = News::orderBy('view_count', 'asc')->limit(3)->get();
      
      return view('public.home', compact('articles', 'news', 'users', 'popularArticles', 'popularNews'));
    }

    public function single($slug){
      $article = Article::with('users', 'comments')->where('slug', '=', $slug)->first();
      $users = User::limit(3)->get();

      $articleKey = 'article_' . $article->id;
      if(!Session::has($articleKey)){
        $viewCount = $article->view_count + 1;
        $article->update(['view_count' => $viewCount]);

        Session::put($articleKey, 1);
      }
      $popularArticles = Article::where('acceptable', 1)->orderBy('view_count', 'asc')->limit(3)->get();
      $popularNews = News::orderBy('view_count', 'asc')->limit(3)->get();
      
      return view('public.single', compact('article', 'users', 'popularArticles', 'popularNews'));
    }

    public function newsSingle($slug){
      $news = News::where('slug', '=', $slug)->first();
      $users = User::limit(3)->get();

      // $articleKey = 'article_' . $article->id;
      // if(!Session::has($articleKey)){
      //   $viewCount = $article->view_count + 1;
      //   $article->update(['view_count' => $viewCount]);

      //   Session::put($articleKey, 1);
      // }

      $newsKey = 'news_' . $news->id;
      if(!Session::has($newsKey)){
        $viewCount = $news->view_count + 1;
        $news->update(['view_count' => $viewCount]);

        Session::put($newsKey, 1);
      }

      $popularArticles = Article::where('acceptable', 1)->orderBy('view_count', 'asc')->limit(3)->get();
      $popularNews = News::orderBy('view_count', 'asc')->limit(3)->get();
      return view('public.news.single', compact('news', 'users', 'popularArticles', 'popularNews'));
    }

    public function articles(){
      $articles = Article::where('acceptable', 1)->orderBy('updated_at', 'desc')->paginate(10);
      $users = User::limit(3)->get();
      
      $popularArticles = Article::where('acceptable', 1)->orderBy('view_count', 'asc')->limit(3)->get();
      $popularNews = News::orderBy('view_count', 'asc')->limit(3)->get();
      return view('public.pages.articles', compact('articles', 'users', 'popularArticles', 'popularNews'));
    }

    public function news(){
      $news = News::orderBy('created_at', 'desc')->paginate(12);
      $users = User::limit(3)->get();
      $popularArticles = Article::where('acceptable', 1)->orderBy('view_count', 'asc')->limit(3)->get();
      $popularNews = News::orderBy('view_count', 'asc')->limit(3)->get();
      return view('public.pages.news', compact('news', 'users', 'popularArticles', 'popularNews'));
    }

    public function seratSingle($slug){
      $serat = Serat::where('slug', '=', $slug)->first();

      $users = User::limit(3)->get();
      return view('public.serat.single', compact('serat', 'users'));
    }

    public function pageUser($slug){
      $user = User::where('slug', '=', $slug)->first();
      $articles = Article::where('user_id', '=', $user->id)->where('acceptable', '=', '1')
                  ->orderBy('id', 'desc')->limit(10)->get();
      $users = User::limit(3)->get();
      return view('public.pages.user', compact('users', 'user', 'articles'));
    }



}
