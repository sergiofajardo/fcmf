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




Route::post('CrearHorario','Cruds\Schedules_physicals_spacesController@CrearHorario')->name('CrearHorario');//obtener las carreras de la facultad seleccionada

Route::post('verhorario','Cruds\Schedules_physicals_spacesController@verhorario')->name('verhorario');//

Route::post('delete','Cruds\Schedules_physicals_spacesController@delete')->name('delete');//

Route::post('EditarHorario','Cruds\Schedules_physicals_spacesController@update_schedule')->name('EditarHorario');



Route::post('/Consultas/Consultar_horario','Cruds\Schedules_physicals_spacesController@Consultar_horario_por_docente')->name('Consultar_horario_por_docente');

Route::post('/Consultas/Consultar_Carreras','Cruds\Schedules_physicals_spacesController@Consultar_Carreras')->name('Consultar_Carreras');

Route::get('/Consultas/Consultar_Horario_docente','Cruds\Schedules_physicals_spacesController@Consultar_Horario_docente')->name('Horario_docente');	

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


//Exportar PDF

Route::POST('pdf_horario_docente', 'PDFController@horario_docente')->name('pdf_horario_docente');

