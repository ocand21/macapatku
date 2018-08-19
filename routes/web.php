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
  Auth::routes();
  Route::get('/dashboard', 'User\UserAppController@index')->name('dashboard');
  Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');
  Route::resource('/article', 'User\ArticleController');
  Route::get('/draft', 'User\DraftController@index')->name('draft.index');
  Route::get('/draft/publish/{id}', 'User\DraftController@publish')->name('draft.publish');
  Route::post('/draft/publish/{id}', 'User\DraftController@store')->name('draft.store.publish');
  Route::delete('/draft/destroy', 'User\DraftController@')->name('draft.destroy');
});

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});
