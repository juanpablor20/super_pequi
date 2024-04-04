<?php

//use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EquipoController;
use  App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/usuarios', App\Http\Controllers\UsuarioController::class);
Route::resource('/programas', App\Http\Controllers\ProgramaController::class);
Route::resource('/servicios', App\Http\Controllers\ServicioController::class);

Route::resource('/equipment', App\Http\Controllers\EquipmentController::class);
Route::resource('/users', UserController::class);
Route::resource('Registers', RegisterController::class);
// Route::post('register', RegisterController::class);

// Route::middleware(['auth'])->group(function () {
//     // Rutas protegidas por autenticación
//     Route::group(['middleware' => ['role:coordinator']], function () {
//         // Rutas para coordinadores
//         Route::get('users', RegisterController::class)->name('register.form');
//         Route::post('users', RegisterController::class)->name('register');
//     });
// });


