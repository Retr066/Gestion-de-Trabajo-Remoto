<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/informes', function () {
    return view('docente.informes');
})->name('informes');


Route::middleware(['auth:sanctum', 'verified'])->get('/informesEnviados', function () {
    return view('docente.informesEnviados');
})->name('informesEnviados');

Route::middleware(['auth:sanctum', 'verified'])->get('/informesAprobados', function () {
    return view('docente.informesAprobados');
})->name('informesAprobados');

Route::middleware(['auth:sanctum', 'verified'])->get('/informesRechazados', function () {
    return view('docente.informesRechazados');
})->name('informesRechazados');

Route::middleware(['auth:sanctum', 'verified'])->get('/reportes', function () {
    return view('docente.reportes');
})->name('reportes');

Route::middleware(['auth:sanctum', 'verified'])->get('/prueba', function () {
    return view('administracion.prueba');
})->name('prueba');

Route::middleware(['auth:sanctum', 'verified'])->get('/rubro', function () {
    return view('administracion.rubro');
})->name('rubro');
