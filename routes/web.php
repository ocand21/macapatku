<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'Front\AppController@index');
Route::get('/article/{slug}', 'Front\AppController@single')->name('article.single');


Route::prefix('user')->group(function(){

  Route::get('/myprofile', 'User\ProfileController@myProfile')->name('myprofile');
  Route::get('/myprofile/edit', 'User\ProfileController@showEditForm')->name('editProfile');
  Route::post('/myprofile/edit', 'USer\ProfileController@editProfile');
  Route::post('/myprofile/upload/profilepicture', 'User\ProfileController@uploadPicture')->name('changePicture');


  Auth::routes();

  Route::get('/dashboard', 'User\UserAppController@index')->name('dashboard');

  Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');


  Route::get('/article/published', 'User\ArticleController@published')->name('article.published');
  Route::get('/article/pending', 'User\ArticleController@pending')->name('article.pending');
  Route::resource('/article', 'User\ArticleController');

  Route::get('/draft', 'User\DraftController@index')->name('draft.index');
  Route::get('/draft/publish/{id}', 'User\DraftController@publish')->name('draft.publish');
  Route::post('/draft/publish/{id}', 'User\DraftController@store')->name('draft.store.publish');
  Route::delete('/draft/destroy', 'User\DraftController@')->name('draft.destroy');

  Route::get('/file', 'User\FileController@index')->name('file.index');
  Route::get('/file/upload', 'User\FileController@form')->name('file.create');
  Route::post('/file/upload', 'User\FileController@upload')->name('file.upload');
  Route::delete('/file/delete/{id}', 'User\FileController@destroy')->name('file.destroy');
});

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
