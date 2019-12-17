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

Route::get('/', function () {
    return view('welcome');
});
Route::namespace('backend')->prefix('admin')->middleware('admin')->group(function (){
    Route::get('home', 'home@index')->name('home.index');
    Route::get('users', 'Users@index')->name('users.index');
    Route::get('doctors', 'Users@doctors')->name('doctors');
    Route::get('users/create', 'Users@create')->name('users.create');
    Route::post('users', 'Users@store')->name('users.store');
    Route::get('users/{id}/edit', 'Users@edit')->name('users.edit');
    Route::put('users/{id}', 'Users@update')->name('users.update');
    Route::delete('users/{id}', 'Users@destroy')->name('users.destroy');

      //

    Route::get('specialties', 'specialties@index')->name('specialties.index');
    Route::get('specialties/create', 'specialties@create')->name('specialties.create');
    Route::post('specialties', 'specialties@store')->name('specialties.store');
    Route::get('specialties/{id}/edit', 'specialties@edit')->name('specialties.edit');
    Route::put('specialties/{id}', 'specialties@update')->name('specialties.update');
    Route::delete('specialties/{id}', 'specialties@destroy')->name('specialties.destroy');

      //

   

     //

    Route::get('posts', 'posts@index')->name('posts.index');
    Route::get('posts/create', 'posts@create')->name('posts.create');
    Route::post('posts', 'posts@store')->name('posts.store');
    Route::get('posts/{id}/edit', 'posts@edit')->name('posts.edit');
    Route::put('posts/{id}', 'posts@update')->name('posts.update');
    Route::delete('posts/{id}', 'posts@destroy')->name('posts.destroy');

    //

    
    Route::get('reservs', 'reservs@index')->name('reservs.index');
    Route::get('reservs/create', 'reservs@create')->name('reservs.create');
    Route::post('reservs', 'reservs@store')->name('reservs.store');
    Route::get('reservs/{id}/edit', 'reservs@edit')->name('reservs.edit');
    Route::put('reservs/{id}', 'reservs@update')->name('reservs.update');
    Route::delete('reservs/{id}', 'reservs@destroy')->name('reservs.destroy');

    Route::post('comments', 'posts@commentStore')->name('comments.store');
    Route::delete('comments/{id}', 'posts@commentDelete')->name('comment.delete');
    Route::put('comments/{id}', 'posts@commentUpdate')->name('comment.update');

    //

    Route::get('videos', 'videos@index')->name('videos.index');
    Route::get('videos/create', 'videos@create')->name('videos.create');
    Route::post('videos', 'videos@store')->name('videos.store');
    Route::get('videos/{id}/edit', 'videos@edit')->name('videos.edit');
    Route::put('videos/{id}', 'videos@update')->name('videos.update');
    Route::delete('videos/{id}', 'videos@destroy')->name('videos.destroy');
      
});

Auth::routes();
Route::get('/', 'HomeController@welcome')->name('frontend.landing');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'HomeController@indexmes')->name('chat');
Route::get('Specialty/{id}', 'HomeController@Specialty')->name('front.Specialty');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');
Route::get('Doctor/{id}', 'HomeController@Doctor')->name('frontend.Doctor');
Route::get('Post/{id}', 'HomeController@index')->name('frontend.Post');
Route::get('post', 'HomeController@index')->name('post.index');
Route::get('post/create', 'HomeController@postcreate')->name('post.create');
Route::post('post', 'HomeController@poststore')->name('front.postStore');
Route::get('video/{id}', 'HomeController@video')->name('frontend.video');

Route::get('/message/{id}', 'HomeController@getMessage')->name('message');
Route::post('message', 'HomeController@sendMessage');

Route::get('Reserv/{id}', 'HomeController@Reserv')->name('frontend.Reserv');
Route::get('Reserv', 'HomeController@Reserv')->name('Reserv.index');
Route::get('Reserv/create', 'HomeController@Reservcreate')->name('Reserv.create');
Route::post('home', 'HomeController@Reservstore')->name('front.ReservStore');


Route::middleware('auth')->group(function () {
  Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');
  Route::put('comments/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
  Route::post('comments/{id}/create', 'HomeController@commentStore')->name('front.commentStore');
  
});
