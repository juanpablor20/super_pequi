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


Route::resource('/equipment', App\Http\Controllers\EquipmentController::class);
Route::resource('/users', UserController::class);





// Definir las rutas para los bibliotecarios
Route::get('bibliotecarios', [UserController::class, 'index'])->name('bibliotecarios.index');
Route::get('/bibliotecarios/create', [UserController::class, 'create'])->name('bibliotecarios.create');
Route::post('/bibliotecarios', [UserController::class, 'store'])->name('bibliotecarios.store');
Route::get('/bibliotecarios/{bibliotecario}', [UserController::class, 'show'])->name('bibliotecarios.show');
Route::get('/bibliotecarios/{bibliotecario}/edit', [UserController::class, 'edit'])->name('bibliotecarios.edit');
Route::put('/bibliotecarios/{bibliotecario}', [UserController::class, 'update'])->name('bibliotecarios.update');
Route::delete('/bibliotecarios/{bibliotecario}', [UserController::class, 'destroy'])->name('bibliotecarios.destroy');

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


