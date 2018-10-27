<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Page;
use App\Gallery;
use App\User;
use App\Serat;

class PageController extends Controller
{
    public function pengertian($slug){
      $page = Page::where('slug', $slug)->first();
      $users = User::limit(3)->get();
      return view('public.pages.definition', compact('page', 'users'));
    }

    public function gallery(){
      $images = Gallery::orderBy('id', 'desc')->get();
      $users = User::limit(3)->get();
      return view('public.pages.gallery', compact('images', 'users'));
    }

    public function serat(){
      $kumpulan = Serat::orderBy('id', 'desc')->get();
      $users = User::limit(3)->get();
      return view('public.pages.serat', compact('kumpulan', 'users'));
    }

    public function contact(){
      $contact = Page::where('slug', '=', 'kontak-kami')->first();
      $users = User::limit(3)->get();
      return view('public.pages.contact', compact('contact', 'users'));
    }



}
