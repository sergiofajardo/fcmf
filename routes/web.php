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

Route::post('obtenerCarreras','Cruds\TeachersController@getcareersbyfaculty')->name('obtenerCarreras');//obtener las carreras de la facultad seleccionada

Route::post('obtenerCarrer','Cruds\TeachersController@getcareersSelectedbyfaculty')->name('obtenerCarrerasSeleccionadas');//

Route::post('obtenerEspacios_fisicos','Cruds\Schedules_physicals_spacesController@getphysicals_spacesbyfaculty')->name('obtenerEspacios_fisicos');//obtener las carreras de la facultad seleccionada

Route::post('obtenerEspacios_fisicos_carrera','Cruds\Schedules_physicals_spacesController@getcareersbyfaculty')->name('obtenerEspacios_fisicos_carrera');//obtener las carreras de la facultad seleccionada

Route::post('obtenerDocentes','Cruds\Schedules_physicals_spacesController@getteachersbycareer')->name('obtenerDocentes');//obtener las carreras de la facultad seleccionada



//Route::get('/facultades/{id_facultad}','FacultiesController@show')->name('facultades/mostrar');

Route::group(['prefix'=>'admin','middleware'=>'auth', 'as'=>'admin.'], function(){
	Route::resource('facultades', 'Cruds\FacultiesController');

	Route::resource('carreras','Cruds\CareersController');
	Route::resource('periodo_lectivo','Cruds\Period_cyclesController');
	Route::resource('espacios_fisicos', 'Cruds\Physical_spacesController');
	Route::resource('paralelos', 'Cruds\ClassroomsController');
	Route::resource('docentes', 'Cruds\TeachersController');
	Route::resource('horario', 'Cruds\Schedules_physicals_spacesController');

	
});

