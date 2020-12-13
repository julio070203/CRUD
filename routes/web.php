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

Route::get('/clientes', 'ClientesController@index');
Route::get('/crear', 'ClientesController@create');
Route::post('/alta','ClientesController@save');
Route::get('/show/{id}','ClientesController@show');
Route::post('/actualizar','ClientesController@update');
Route::get('/borrar/{id}','ClientesController@destroy');