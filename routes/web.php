<?php

use Illuminate\Support\Facades\Route;

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


//=========> Admin Routes
// Authentication route
   Auth::routes();
   Route::group(['namespace' => 'App\Http\Controllers\Admin'], function(){
      Route::group(['prefix' => 'admin'], function(){
         Route::get('/dashboard', 'PagesController@index')->name('admin.dashboard');

         // Slider all route here
         Route::resource('slider','SliderController');
         // Category all route here
         Route::resource('category','CategoryController');
         // Item all route here
         Route::resource('item','ItemController');
         // Reservation
         Route::get('/reservation','ReservController@index')->name('reserv.index');
         Route::post('/reservation/confirm/{id}','ReservController@status')->name('reserv.status');
         Route::post('/reservation/destroy/{id}','ReservController@destroy')->name('reserv.destroy');
         // Contact
         Route::get('/contact', 'contaController@index')->name('contact.index');
         Route::get('/contact/show/{id}', 'contaController@show')->name('contact.show');
         Route::post('/contact/destroy/{id}', 'contaController@destroy')->name('contact.destroy');
      });
   });


//=========> Frontend Routes
// public pages route
   Route::group(['namespace' => 'App\Http\Controllers'], function(){
      Route::get('/', 'PagesController@index')->name('index');
      Route::post('/reservation', 'ReservationController@store')->name('reserve.store');
      Route::post('/contact/store', 'ContactController@store')->name('contact.store');
   });



