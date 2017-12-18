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

use Illuminate\Support\Facades\Route;

//Authentication
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

//Registration
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'Auth\RegisterController@register');

//Password reset
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Homepage
Route::get('/', 'PagesController@index')->name('index');

//Pages
Route::get('/postlist', 'PagesController@postList')->name('postList');

//Slug URL Single Post
Route::get('/post/{slug}', ['as' => 'postSingle', 'uses' =>'PagesController@postSingle'])
    ->where('slug', '[\w\d\-\_]+');



//Post CRUD
Route::get('/postcreate', 'PostController@postCreate')->name('postCreate');

Route::get('/poststore', 'PostController@postStore');

Route::post('/poststore', 'PostController@postStore')->name('postStore');

Route::get('/postshow/{id}', 'PostController@postShow')->name('postShow');

Route::get('/postedit/{id}', 'PostController@postEdit')->name('postEdit');

Route::get('/posteupdate/{id}', 'PostController@postUpdate')->name('postUpdate');

Route::put('/posteupdate/{id}', 'PostController@postUpdate')->name('postUpdate');

Route::delete('/postdestroy/{id}', 'PostController@postDestroy')->name('postDestroy');

//Category CRUD
Route::get('/categorylist', 'CategoryController@categoryList')->name('categoryList');

Route::get('/categorycreate', 'CategoryController@categoryCreate')->name('categoryCreate')->middleware('auth');

Route::get('/categorystore', 'CategoryController@categoryStore')->middleware('auth');

Route::post('/categorystore', 'CategoryController@categoryStore')->name('categoryStore')->middleware('auth');

Route::get('/categoryshow/{id}', 'CategoryController@categoryShow')->name('categoryShow');

Route::get('/categoryedit/{id}', 'CategoryController@categoryEdit')->name('categoryEdit');

Route::get('/categoryupdate/{id}', 'CategoryController@categoryUpdate')->name('categoryUpdate');

Route::put('/categoryupdate/{id}', 'CategoryController@categoryUpdate')->name('categoryUpdate');

Route::delete('/categorydestroy/{id}', 'CategoryController@categoryDestroy')->name('categoryDestroy');

//Tags CRUD
Route::get('/taglist', 'TagController@tagList')->name('tagList');

Route::get('/tagcreate', 'TagController@tagCreate')->name('tagCreate')->middleware('auth');

Route::get('/tagstore', 'TagController@tagStore')->middleware('auth');

Route::post('/tagstore', 'TagController@tagStore')->name('tagStore')->middleware('auth');

Route::get('/tagshow/{id}', 'TagController@tagShow')->name('tagShow');

Route::get('/tagedit/{id}', 'TagController@tagEdit')->name('tagEdit')->middleware('auth');

Route::get('/tagupdate/{id}', 'TagController@tagUpdate')->name('tagUpdate')->middleware('auth');

Route::put('/tagupdate/{id}', 'TagController@tagUpdate')->name('tagUpdate')->middleware('auth');

Route::delete('/tagdestroy/{id}', 'TagController@tagDestroy')->name('tagDestroy')->middleware('auth');