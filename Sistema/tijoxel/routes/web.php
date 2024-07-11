<?php

use App\Http\Controllers\ArchivoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerEvaluacionController;
use App\Http\Controllers\SubirEvaluacionController;

Route::get('/', function () {
    return view('principal');
});
Route::get('/crear-cuenta', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuenta', [RegisterController::class, 'store']);
//Route::get('/autenticar', [RegisterController::class, 'autenticar']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

#Route::get('/{user:username}', [PanelController::class, 'index'])->name('panel');
Route::get('/panel', [PanelController::class, 'index'])->name('panel');
Route::get('/ver', [VerEvaluacionController::class, 'index'])->name('verevaluacion');
//para subir el formulario de la evaluacion docente, datos mas archivo
Route::get('/subir', [SubirEvaluacionController::class, 'index'])->name('subirevaluacion');
//para subir solamente el archivo pdf con DROPZONE
Route::post('/archivo', [ArchivoController::class, 'store'])->name('upload');
