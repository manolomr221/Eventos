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

