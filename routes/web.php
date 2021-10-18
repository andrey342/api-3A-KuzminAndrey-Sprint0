<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicionController;

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

// --------------------------------------------------------------
// web.php
//
// Autor: Andrey Kuzmin
// 2021-18-09
//
// --------------------------------------------------------------
//
// Archivo que contiene todas las rutas y a los metodos que llama del controlador al insertar la ruta en el navegador.
//

/**
 *
 * Ruta que muestra todas las mediciones de CO2 , llama a la funcion showAll del archivo MedicionController.php
 *
 */
Route::get('medicionesCO2', [MedicionController::class, 'showAll'])->name('inicio');
/**
 *
 * Ruta que muestra la ultima medicion de CO2, llama a la funcion show del archivo MedicionController.php
 *
 */
Route::get('ultimaMedicionCO2', [MedicionController::class, 'show'])->name('inicio.ultimaMedicion');
/**
 *
 * Ruta que crea medicion para cada coleccion de CO2 y temperatura, llama a la funcion create del archivo MedicionController.php
 *
 */
Route::get('crearMedicion', [MedicionController::class, 'create'])->name('inicio.crearMedicion');

