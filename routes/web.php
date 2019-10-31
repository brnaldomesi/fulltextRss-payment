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
  return view('home');
});

Route::get('/home', function () {
  return view('home');
})->name('home');

Route::get('/pricing', function () {
  return view('pricing');
})->name('pricing');

Route::get('/tour', function () {
  return view('tour');
})->name('tour');

Route::get('/contact', function () {
  return view('contact');
})->name('contact');

Route::get('/blog', function () {
  return view('blog');
})->name('blog');

Route::group(['middleware' => 'auth'], function () {
  Route::namespace('ClientAdmin')->group(function () {
    Route::prefix('clientAdmin')->group(function () {
      Route::get('feeds', 'FeedsController@index')->name('feeds');
      Route::get('feeds/new', 'FeedsController@new')->name('feeds.new');
      Route::post('feeds/store', 'FeedsController@store')->name('feeds.store');
    });
  });
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
