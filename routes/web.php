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
    return view('informes');
})->name('informes');


Route::middleware(['auth:sanctum', 'verified'])->get('/informesEnviados', function () {
    return view('informesEnviados');
})->name('informesEnviados');

Route::middleware(['auth:sanctum', 'verified'])->get('/informesAprobados', function () {
    return view('informesAprobados');
})->name('informesAprobados');

Route::middleware(['auth:sanctum', 'verified'])->get('/informesRechazados', function () {
    return view('informesRechazados');
})->name('informesRechazados');

Route::middleware(['auth:sanctum', 'verified'])->get('/reportes', function () {
    return view('reportes');
})->name('reportes');

Route::middleware(['auth:sanctum', 'verified'])->get('/prueba', function () {
    return view('prueba');
})->name('prueba');
