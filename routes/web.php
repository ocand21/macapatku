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
Route::get('/page/articles', 'Front\AppController@articles')->name('page.articles');
Route::get('/page/news', 'Front\AppController@news')->name('page.news');
Route::get('/news/{slug}', 'Front\AppController@newsSingle')->name('news.single');
Route::get('/page/kontak-kami', 'Front\PageController@contact')->name('page.contact');
Route::get('/page/kumpulan-serat', 'Front\PageController@serat')->name('page.serat');
Route::get('/page/galeri', 'Front\PageController@gallery')->name('page.gallery');
Route::get('/page/{slug}', 'Front\PageController@pengertian')->name('page.single');
Route::get('/article/{slug}', 'Front\AppController@single')->name('article.single');
Route::post('/comments/{id}', 'Front\CommentController@store')->name('comment');
Route::get('kumpulan-serat/{serat}', 'Front\AppController@seratSingle')->name('serat.single');
Route::get('/pengguna/{name}', 'Front\AppController@pageUser')->name('page.user');

Route::prefix('user')->group(function(){

  Route::get('/myprofile', 'User\ProfileController@myProfile')->name('myprofile');
  Route::get('/myprofile/edit', 'User\ProfileController@showEditForm')->name('editProfile');
  Route::post('/myprofile/edit', 'USer\ProfileController@editProfile');
  Route::post('/myprofile/upload/profilepicture', 'User\ProfileController@uploadPicture')->name('changePicture');


  $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
  $this->post('login', 'Auth\LoginController@login');
  $this->post('logout', 'Auth\LoginController@logout')->name('logout');

        // Registration Routes...
  $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  $this->post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
  $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
  $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
  $this->post('password/reset', 'Auth\ResetPasswordController@reset');
  Route::get('/password/reset/{token}/{email}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');

  Route::get('/dashboard', 'User\UserAppController@index')->name('dashboard');

  Route::get('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

  Route::get('/auth/{provider}', 'Auth\LoginController@redirectToProvider');
  Route::get('/auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


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


  Route::resource('serat', 'Admin\SeratController');

  Route::get('/password/change', 'Admin\ProfileController@getChangePasswordForm')->name('admin.change.password');
  Route::post('/password/change', 'Admin\ProfileController@changePassword');

  Route::get('/category', 'Admin\CategoryController@index')->name('category.index');
  Route::post('/category/new', 'Admin\CategoryController@store')->name('category.store');
  Route::delete('/category/destroy', 'Admin\CategoryController@destroy')->name('category.destroy');


  Route::get('/staff', [
    'as' => 'admin.staff',
    'uses' => 'Admin\AdminController@index'
  ]);
  Route::get('/staf/create', 'Admin\AdminController@create')->name('staff.new');
  Route::post('/staf/create', 'Admin\AdminController@store')->name('staff.register');

  Route::get('/myprofile', 'Admin\ProfileController@myProfile')->name('admin.profile');
  Route::get('/myprofile/edit', 'Admin\ProfileController@edit')->name('admin.profile.edit');
  Route::post('/myprofile/edit', 'Admin\ProfileController@storeEdit');
  Route::post('/myprofile/changepicture', 'Admin\ProfileController@changePicture')->name('admin.changePicture');

  Route::get('/gallery', 'Admin\GalleryController@index')->name('gallery.index');
  Route::get('/gallery/upload', 'Admin\GalleryController@create')->name('gallery.upload');
  Route::post('/gallery/upload/store', 'Admin\GalleryController@upload')->name('gallery.store');
  Route::delete('/gallery/delete/{id}', 'Admin\GalleryController@delete')->name('gallery.destroy');
  Route::get('/gallery/show', 'Admin\GalleryController@show')->name('gallery.show');
  Route::post('/gallery/description/{id}', 'Admin\GalleryController@desc')->name('gallery.desc');

  Route::resource('/news', 'Admin\NewsController');
  Route::resource('/pages', 'Admin\PageController');

  Route::get('/article/pending', 'Admin\ArticleController@pending')->name('admin.article.pending');
  Route::get('/article/published', 'Admin\ArticleController@published')->name('admin.article.published');
  Route::post('/article/publish/{article}', 'Admin\ArticleController@publish')->name('admin.publish.article');
  Route::delete('/article/decline/{article}', 'Admin\ArticleController@reject')->name('admin.decline.article');

  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  $this->get('password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  $this->post('password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  $this->post('password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}/{email}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
