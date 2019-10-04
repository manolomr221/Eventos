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

Route::get('/', 'AdminController@welcome')->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Admin/registrar', function(){
    return view('/Admin/crearEvento');
} )->middleware('Administrador');



Route::post('/Admin/registrar/evento',  'AdminController@crearEvento')->middleware('Administrador');
Route::get('/eventos', 'AdminController@eventos')->name('eventos');
//ruta para eliminar evento
Route::post('/Admin/evento/{id}/eliminar', 'AdminController@eliminarEvento')->middleware('Administrador');
//ruta para editar evento
Route::get('/Admin/evento/{id}/editar','AdminController@editarEvento')->middleware('Administrador');
Route::post('/Admin/evento/{id}/guardarCambios','AdminController@guardarCambiosEvento')->middleware('Administrador');

//guardar imagen
Route::post('/configuracion/{id}/guardarImagen','HomeController@guardarImagen');

//ultimo agregado
Route::get('eventos/paginacion', 'AdminController@paginacion');
Route::get('eventos/buscador','AdminController@buscador');

Route::get('eventos/buscador','AdminController@buscador');

Route::get('/Academicos','AdminController@eventosAcademicos');

Route::get('/evento/{id}/ver','AdminController@verEvento')->middleware('Administrador');