<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use Session;
class CategoryController extends Controller
{
    public function index(){
      $category = Category::orderBy('id', 'asc')->get();

      return view('admin.category.index', compact('category'));
    }

    public function store(Request $request){
      $this->validate($request, [
        'name' => 'required|string|max:255',
      ]);

      $category = new Category;

      $category->name = $request->input('name');

      $category->save();

      Session::flash('flash_message', 'Kategori berhasil ditambahkan!');

      return redirect()->back();

    }

    public function destroy($id){

    }
}
