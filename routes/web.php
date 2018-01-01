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

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/facultad', 'FacultiesController@index')->name('facultad');


//Route::get('/facultades/{id_facultad}','FacultiesController@show')->name('facultades/mostrar');

Route::group(['prefix'=>'admin','middleware'=>'auth', 'as'=>'admin.'], function(){
	Route::resource('facultades', 'Cruds\FacultiesController');

	Route::resource('carreras','Cruds\CareersController');
	Route::resource('periodo_lectivo','Cruds\Period_cyclesController');
	Route::resource('espacios_fisicos', 'Cruds\Physical_spacesController');
	Route::resource('paralelos', 'Cruds\ClassroomsController');

	
});

