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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/inicio', 'HomeController@index');

//Aulas
Route::resource('/aulas',  'AulaController');
Route::put( '/aulas/editar/{id}', 'AulaController@update');
Route::delete( '/aulas/eliminar/{id}', 'AulaController@destroy')->name("eliminaraula");


//Caracteristicas
Route::resource('/caracteristicas',  'CaracteristicaController');
Route::put( '/caracteristicas/editar/{id}', 'CaracteristicaController@update');
Route::delete( '/caracteristicas/eliminar/{id}', 'CaracteristicaController@destroy')->name("eliminarcaracteristica");



//EDIFICIO
Route::resource('/edificios',  'EdificioController');
Route::put( '/edificios/editar/{id}', 'EdificioController@update');
Route::delete( '/edificios/eliminar/{id}', 'EdificioController@destroy')->name("eliminaredificio");

//PISO
Route::resource('/pisos',  'PisoController');
Route::put( '/pisos/editar/{id}', 'PisoController@update');
Route::delete( '/pisos/eliminar/{id}', 'PisoController@destroy')->name("eliminarpiso");

//PERIODO
Route::resource('/periodos',  'PeriodoController');
Route::put( '/periodos/editar/{id}', 'PeriodoController@update');
Route::delete( '/periodos/eliminar/{id}', 'PeriodoController@destroy')->name("eliminarperiodo");