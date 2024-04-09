<?php

//use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\BibliotecarioController;
use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PerfilController;
use  App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/perfil', PerfilController::class);
Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);


Route::resource('/equipment', EquipmentController::class);
Route::resource('/users', UserController::class);
Route::resource('bibliotecarios', BibliotecarioController::class);
 
Route::resource('/services', ServiceController::class);




// Definir las rutas para los bibliotecarios

//Route::resource('Registers', RegisterController::class);
// Route::post('register', RegisterController::class);

// Route::middleware(['auth'])->group(function () {
//     // Rutas protegidas por autenticación
//     Route::group(['middleware' => ['role:coordinator']], function () {
//         // Rutas para coordinadores
//         Route::get('users', RegisterController::class)->name('register.form');
//         Route::post('users', RegisterController::class)->name('register');
//     });
// });


// Rutas para el registro de bibliotecarios



