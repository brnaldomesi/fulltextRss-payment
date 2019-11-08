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
  Route::namespace('Dashboard')->group(function () {
    Route::prefix('dashboard')->group(function () {
      Route::get('feeds', 'FeedsController@index')->name('feeds');
      Route::get('feeds/new', 'FeedsController@new')->name('feeds.new');
      Route::post('feeds/store', 'FeedsController@store')->name('feeds.store');
      Route::post('feedstable', 'FeedsController@feedsTable')->name('feeds.feedsTable');
      Route::get('feeds/{feed}/edit', 'FeedsController@edit')->name('feeds.edit');
      Route::put('feeds/{feed}', 'FeedsController@update')->name('feeds.update');
      Route::delete('feeds/{feed}', 'FeedsController@destroy')->name('feeds.destroy');
      Route::delete('feeds', 'FeedsController@destroyArray')->name('feeds.destroyArray');

      Route::get('users', 'UserController@index')->name('users');
      Route::get('users/new', 'UserController@new')->name('users.new');
      Route::post('users/store', 'UserController@store')->name('users.store');
      Route::post('userstable', 'UserController@usersTable')->name('users.usersTable');
      Route::get('users/pwdedit', 'UserController@pwdEdit')->name('users.pwdEdit');
      Route::put('users/pwdupdate', 'UserController@pwdUpdate')->name('users.pwdUpdate');
      Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
      Route::put('users/{user}', 'UserController@update')->name('users.update');
      Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
      Route::delete('users', 'UserController@destroyArray')->name('users.destroyArray');
      
      Route::get('smtp', 'UserController@smtp')->name('smtp');

      Route::get('home', 'HomeController@index')->name('home');
      Route::get('plans', 'PlanController@index')->name('plans.index');
      Route::get('plan/{plan}/{billing_method}/{payment_plan}', 'PlanController@show')->name('plans.show');
      Route::post('subscription', 'SubscriptionController@create')->name('subscription.create');
      Route::get('paypal/ec-checkout/{plan}', 'PayPalController@getExpressCheckout')->name('paypal.ec-checkout');
      Route::get('paypal/ec-checkout-success/{plan}', 'PayPalController@getExpressCheckoutSuccess')->name('paypal.ec-checkout-success');
      Route::get('paypal/adaptive-pay', 'PayPalController@getAdaptivePay');
      Route::get('paypal/cancel', 'PayPalController@cancel')->name('paypal.cancel');
    });
  });
});

Route::post('paypal/notify', 'Dashboard\\PayPalController@notify');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');