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
      Route::post('feedsTable', 'FeedsController@feedsTable')->name('feeds.feedsTable');
      Route::get('feeds/{feed}/edit', 'FeedsController@edit')->name('feeds.edit');
      Route::put('feeds/{feed}', 'FeedsController@update')->name('feeds.update');
      Route::delete('feeds/{feed}', 'FeedsController@destroy')->name('feeds.destroy');
      Route::get('home', 'HomeController@index')->name('home');
      Route::get('plans', 'PlanController@index')->name('plans.index');
      Route::get('plan/{plan}/{billing_method}/{payment_plan}', 'PlanController@show')->name('plans.show');
      Route::post('subscription', 'SubscriptionController@create')->name('subscription.create');
      Route::get('paypal/ec-checkout/{plan}', 'PayPalController@getExpressCheckout')->name('paypal.ec-checkout');
      Route::get('paypal/ec-checkout-success/{plan}', 'PayPalController@getExpressCheckoutSuccess')->name('paypal.ec-checkout-success');
      Route::get('paypal/adaptive-pay', 'PayPalController@getAdaptivePay');
      Route::post('paypal/notify', 'PayPalController@notify');
    });
  });
});


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');