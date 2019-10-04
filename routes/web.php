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

//Route::get('/', function () {
////    return view('welcome');
//});

//Route::get('/', 'HomeController@index');

//Route::get('/clientes', 'ClientesController@clientes');
//Route::get('/clientes/novo', 'ClientesController@novo');
//Route::post('/clientes/salvar', 'ClientesController@salvar');

//Route::get('/login', function () {
    //return view('login');
//});

//Route::get('/dashboard', function () {
   // return view('dashboard');
//});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/clientes', 'ClientesController@index')->name('clientes');
Route::get('/clientes/novo', 'ClientesController@novo')->name('novo');
Route::get('/clientes/{cliente}/editar', 'ClientesController@editar')->name('editar');
Route::post('/clientes/salvar', 'ClientesController@salvar')->name('salvar');
Route::post('/clientes/atualizar/{id}', 'ClientesController@atualizar')->name('atualizar');
Route::post('/clientes/{cliente}', 'ClientesController@deletar')->name('deletar');
