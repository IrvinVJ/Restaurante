<?php

use App\Http\Controllers\IngresoController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['middleware' => ['auth']], function(){
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('roles', RolController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('ingresos', IngresoController::class);
    Route::resource('platos', PlatoController::class);
    Route::resource('ordens', OrdenController::class);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
