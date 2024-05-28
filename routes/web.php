<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

/*
Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');
Route::get('/usuarios/create', 'UsuarioController@create')->name('usuarios.create');
Route::get('/usuarios', 'UsuarioController@store')->name('usuarios.store');
Route::get('/usuarios/{id}', 'UsuarioController@show')->name('usuarios.show');
Route::get('/usuarios/{id}/edit', 'UsuarioController@edit')->name('usuarios.edit');
Route::put('/usuarios/{id}', 'UsuarioController@update')->name('usuarios.update');
Route::patch('/usuarios/{id}', 'UsuarioController@update');
Route::delete('/usuarios/{id}', 'UsuarioController@destroy')->name('usuarios.destroy');
*/

Route::resource('usuarios', UsuarioController::class);

Route::resource('paises', PaisController::class);

Route::resource('alquileres', AlquilerController::class);

Route::resource('inquilinos', InquilinoController::class);

Route::resource('departamentos', DepartamentoController::class);
