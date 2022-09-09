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
    return view('Docente.informes');
})->name('informes')->middleware('can_view:Docente');

Route::get('informes/Pdf/{id}/dowload', [InformeTable::class, 'GenerarPdf'])->where(['id' => '[0-9]+' ])->middleware(['middleware' => 'auth:sanctum'])->name('pdf');
//Rutas para Docentes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('docente/informesRechazados', 'Docente.informesRechazados')->name('informesRechazados')->middleware('can_view:Docente');
    Route::view('docente/reportes', 'Docente.reportes')->name('reportesdocente')->middleware('can_view:Docente');
    Route::view('docente/list', 'Docente.list')->name('listDocente')->middleware('can_view:Docente');
    Route::view('docente/chat', 'Jefatura.chat')->name('chat_docente')->middleware('can_view:Docente');
});

//Rutas para Jefatura
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('jefatura/list', 'Jefatura.list')->name('listJefatura')->middleware('can_view:Jefatura');
    Route::view('jefatura/informes', 'Jefatura.informesJefatura')->name('informesJefatura')->middleware('can_view:Jefatura');
    Route::view('jefatura/comparar', 'Jefatura.comparar')->name('comparar')->middleware('can_view:Jefatura');
    Route::view('jefatura/chat', 'Jefatura.chat')->name('chat_jefatura')->middleware('can_view:Jefatura');
    Route::view('jefatura/reportes', 'Jefatura.reportes')->name('reportesjefatura')->middleware('can_view:Jefatura');

});

/* Route::middleware(['auth:sanctum', 'verified'])->get('/jefatura/chat', function () {
    return view('jefatura.chat');
})->name('chat')->middleware('can_view:Jefatura')->middleware('can_view:Docente'); */

//Rutas para administracion
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::view('administracion/prueba', 'Administracion.prueba')->name('prueba')->middleware('can_view:Administracion');
    Route::view('administracion/rubro', 'Administracion.rubro')->name('rubro')->middleware('can_view:Administracion');
    Route::view('administracion/permisos', 'Administracion.permisos')->name('permisos')->middleware('can_view:Administracion');
    Route::view('bienvenido', 'Administracion.bienvenido')->name('bienvenido');
    Route::view('administracion/informes', 'Administracion.informesAdministracion')->name('informesAdministracion')->middleware('can_view:Administracion');
    Route::view('administracion/list', 'Administracion.list')->name('listAdministracion')->middleware('can_view:Administracion');
    Route::view('administracion/reportes', 'Jefatura.reportes')->name('reportesadministracion')->middleware('can_view:Administracion');
});
