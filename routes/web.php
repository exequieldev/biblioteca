<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::prefix('libros')->group(function () {
    Route::get('/', [LibroController::class, 'index'])->name('libros.index');
    Route::get('/create', [LibroController::class, 'create'])->name('libros.create');
    Route::post('/', [LibroController::class, 'store'])->name('libros.store');
    
});

Route::prefix('prestamos')->group(function () {
    Route::get('/', [PrestamoController::class, 'index'])->name('prestamos.index');
    Route::get('/create', [PrestamoController::class, 'create'])->name('prestamos.create');
    Route::post('/', [PrestamoController::class, 'store'])->name('prestamos.store');
    Route::patch('/{prestamo}/cambiar-estado', [PrestamoController::class, 'devolver'])->name('prestamos.cambiarEstado');
});