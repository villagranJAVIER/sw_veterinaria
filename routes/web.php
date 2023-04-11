<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicioController;
use App\Models\Service;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
//Ruta para el welcom
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'servicios' => Service::all(),
    ]);
});

//Rutas protegidas por el middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard',[
            'servicios' => Service::all(),
        ]);

    })->name('dashboard');

    Route::group(['middleware' => 'admin'], function () {
        Route::resource('servicios', ServiceController::class)->parameters(['servicios' => 'servicios']);
        Route::post('servicios/upload/subir', [ServiceController::class, 'upload'])->name('upload');
    });

    Route::group(['middleware' => 'cliente'], function () {
        Route::resource('reservaciones', ReservationController::class)->parameters(['reservaciones' => 'reservaciones']);
    });
});
