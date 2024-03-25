<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EquipoController;
use  App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/equipos', EquipoController::class);
Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
Route::resource('/programas', App\Http\Controllers\ProgramaController::class);
Route::resource('/servicios', App\Http\Controllers\ServicioController::class);

Route::resource('/users', UserController::class);
