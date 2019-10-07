<?php

use Illuminate\Http\Request;

//use Illuminate\Routing\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
  //  return $request->user();
//});


Route::namespace('API')->group(function(){
    Route::get('/cliente', 'ClienteController@index')->name('api.cliente');
    Route::get('/cliente/{id}', 'ClienteController@show')->name('api.show');
    Route::post('/cliente', 'ClienteController@store')->name('api.store');
    Route::put('/cliente/{id}', 'ClienteController@update')->name('api.update');
    Route::delete('/cliente/{id}', 'ClienteController@delete')->name('api.delete');
});