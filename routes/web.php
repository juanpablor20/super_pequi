<?php

//use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\BibliotecarioController;
use App\Http\Controllers\DevolucionController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\HistorialController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IndexCardController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\ProgramController;
use  App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/users', UserController::class);
    Route::resource('bibliotecarios', BibliotecarioController::class);
    Route::resource('/perfil', PerfilController::class);
    Route::resource('/equipment', EquipmentController::class);
    Route::resource('/environments', EnvironmentController::class);
    Route::resource('/indexcards', IndexCardController::class);
    Route::resource('/programs', ProgramController::class);
    Route::post('/prestamos', [PrestamosController::class, 'store'])->name('prestamos');
    Route::post('/devolucion', [DevolucionController::class, 'devolver'])->name('devolucion');
    Route::get('/buscarUsuario', [PrestamosController::class, 'buscarUsuario'])->name('buscarUsuario');
    Route::get('mostrarServicio/{id}', [ServiceController::class, 'show'])->name('mostrarServicio');
    Route::get('item.search', [ServiceController::class, 'show'])->name('item.search');
    Route::get('/programa.search', [ServiceController::class, 'programaSearch'])->name('programa.search');
    Route::get('/historial', [HistorialController::class, 'historico'])->name('historial');
    Route::get('/filtro_service', [HistorialController::class, 'filterService'])->name('filtro_service');
});


Route::get('/error', function () {
    return view('error');
})->name('error');




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
