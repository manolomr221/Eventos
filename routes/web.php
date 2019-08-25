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