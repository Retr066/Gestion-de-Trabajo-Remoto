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



Route::middleware(['auth:sanctum', 'verified'])->get('informes', function () {
    return view('docente.informes');
})->name('informes')->middleware('role:SuperUsuario|Docente|Jefatura|Administracion');

//Rutas para Docentes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('docente/informesEnviados', 'docente.informesEnviados')->name('informesEnviados')->middleware('can_view:Docente');
    Route::view('docente/informesAprobados', 'docente.informesAprobados')->name('informesAprobados')->middleware('can_view:Docente');
    Route::view('docente/informesRechazados', 'docente.informesRechazados')->name('informesRechazados')->middleware('can_view:Docente');
    Route::view('docente/reportes', 'docente.reportes')->name('reportes')->middleware('can_view:Docente');
    Route::view('docente/list', 'docente.list')->name('listDocente')->middleware('can_view:Docente');
});

//Rutas para Jefatura
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('jefatura/list', 'jefatura.list')->name('listJefatura')->middleware('can_view:Jefatura');


});

//Rutas para administracion
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('administracion/prueba', 'administracion.prueba')->name('prueba')->middleware('can_view:Administracion');
    Route::view('administracion/rubro', 'administracion.rubro')->name('rubro')->middleware('can_view:Administracion');
    Route::view('administracion/permisos', 'Administracion.permisos')->name('permisos')->middleware('can_view:Administracion');
});




/* Route::middleware(['auth:sanctum', 'verified'])->get('/informesEnviados', function () {
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
})->name('rubro'); */
