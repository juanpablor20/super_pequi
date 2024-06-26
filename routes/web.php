<?php

//use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\BibliotecarioController;
use App\Http\Controllers\DevolucionController;
use App\Http\Controllers\DisabilityController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\FilterController;
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
use App\Models\Disability;
use App\Models\Service;

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/users', UserController::class);
    Route::resource('bibliotecarios', BibliotecarioController::class)->middleware('can:index.bibliotecario');
    Route::post('bibliotecarios/{id}/active', [BibliotecarioController::class, 'activate'])->name('bibliotecarios.activate')->middleware('can:index.bibliotecario');
    

    Route::resource('/perfil', PerfilController::class);
    Route::resource('/equipment', EquipmentController::class);
    Route::resource('/environments', EnvironmentController::class)->middleware('can:users');
    Route::resource('/indexcards', IndexCardController::class)->middleware('can:users');
    Route::resource('/programs', ProgramController::class)->middleware('can:users');
    Route::post('/prestamos', [PrestamosController::class, 'store'])->name('prestamos')->middleware('can:users');
    Route::get('resivir', [DevolucionController::class, 'resivir'])->name('resivir');
    Route::get('/Report', [DisabilityController::class, 'Report'])->name('Report');
    Route::post('ReportCreate', [DisabilityController::class, 'ReportCreate'])->name('ReportCreate');
    Route::post('/devolucion', [DevolucionController::class, 'devolver'])->name('devolucion')->middleware('can:users');
    Route::get('/buscarUsuario', [PrestamosController::class, 'buscarUsuario'])->name('buscarUsuario')->middleware('can:users');
    Route::get('mostrarServicio/{id}', [ServiceController::class, 'show'])->name('mostrarServicio')->middleware('can:users');
    Route::get('aula.search', [ServiceController::class, 'aulaSearch'])->name('aula.search')->middleware('can:users');
    Route::get('/programa.search', [ServiceController::class, 'programaSearch'])->name('programa.search')->middleware('can:users');
    Route::get('/historial', [HistorialController::class, 'historico'])->name('historial');
    Route::get('/filtro_service', [HistorialController::class, 'filterService'])->name('filtro_service')->middleware('can:users');
    Route::get('/filtro_users', [FilterController::class, 'filterUser'])->name('filtro_users')->middleware('can:users');
    Route::resource('/disabilities', App\Http\Controllers\DisabilityController::class);
    Route::get('/disabilities', [DisabilityController::class, 'create'])->name('disabilities.create');
    Route::get('/disabilities', [DisabilityController::class, 'index'])->name('disabilities.index');
    Route::get('/devolucion', [DevolucionController::class, 'showDevolucionForm'])->name('showDevolucionForm');
});
 



Route::get('/error', function () {
    return view('error');
})->name('error');


