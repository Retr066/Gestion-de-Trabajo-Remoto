<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Livewire\InformeTable;
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
})->name('informes')->middleware('can_view:Docente');

Route::get('informes/Pdf/{id}/dowload', [InformeTable::class, 'GenerarPdf'])->where(['id' => '[0-9]+' ])->middleware(['middleware' => 'auth:sanctum'])->name('pdf');
//Rutas para Docentes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('docente/informesRechazados', 'docente.informesRechazados')->name('informesRechazados')->middleware('can_view:Docente');
    Route::view('docente/reportes', 'docente.reportes')->name('reportes')->middleware('can_view:Docente');
    Route::view('docente/list', 'docente.list')->name('listDocente')->middleware('can_view:Docente');
});

//Rutas para Jefatura
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('jefatura/list', 'jefatura.list')->name('listJefatura')->middleware('can_view:Jefatura');
    Route::view('jefatura/informes', 'jefatura.informesJefatura')->name('informesJefatura')->middleware('can_view:Jefatura');
    Route::view('jefatura/comparar', 'jefatura.comparar')->name('comparar')->middleware('can_view:Jefatura');
});

//Rutas para administracion
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('administracion/prueba', 'administracion.prueba')->name('prueba')->middleware('can_view:Administracion');
    Route::view('administracion/rubro', 'administracion.rubro')->name('rubro')->middleware('can_view:Administracion');
    Route::view('administracion/permisos', 'Administracion.permisos')->name('permisos')->middleware('can_view:Administracion');
    Route::view('bienvenido', 'Administracion.bienvenido')->name('bienvenido');
    Route::view('administracion/informes', 'administracion.informesAdministracion')->name('informesAdministracion')->middleware('can_view:Administracion');
    Route::view('administracion/list', 'administracion.list')->name('listAdministracion')->middleware('can_view:Administracion');
});
