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
    return view('home');
});

Auth::routes(['verify' => true]);
//Route::get('/voluntarios', 'VoluntariosController@index');

//Route::get('/voluntarios/create', 'VoluntariosController@create');
Route::resource('voluntarios', 'VoluntariosController');
Route::resource('horario', 'HorarioController');
Route::resource('evento', 'EventoController');
Route::get('/home', 'VoluntariosController@index')->name('home');
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
Route::get('voluntarios/create', 'VoluntariosController@create')->name('voluntarios.create');
Route::get('voluntarios/{voluntario}/edit', 'VoluntariosController@edit')->name('voluntarios.edit');
Route::get('evento/{evento}/edit', 'EventoController@edit')->name('evento.edit');
Route::get('evento/{evento}/creado', 'EventoController@notificarEventoCreado')->name('evento.aprobado');
Route::get('voluntarios/destroy', 'VoluntariosController@destroy')->name('voluntarios.destroy');
Route::post('archivo/cargar', 'ArchivoController@upload')->name('archivo.upload');
Route::get('archivo/{archivo}/descargar', 'ArchivoController@download')->name('archivo.download');
Route::post('archivo/{archivo}/borrar', 'ArchivoController@delete')->name('archivo.delete');
});
