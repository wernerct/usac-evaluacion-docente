<?php

use App\Http\Controllers\ArchivoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReiniciarClaveController;
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

//para subir el formulario de la evaluacion docente, datos mas archivo
Route::get('/subir/{QCatedratico}', [SubirEvaluacionController::class, 'index'])->name('subirevaluacion');
Route::post('/subir', [SubirEvaluacionController::class, 'store'])->name('guardasubirevaluacion');

//para subir solamente el archivo pdf con DROPZONE
Route::post('/archivo', [ArchivoController::class, 'store'])->name('upload');

//Route::get('/{user:username}', [PanelController::class, 'index'])->name('panel');
Route::get('/panel', [PanelController::class, 'index'])->name('panel');

//para cambio y reinicio de clave
Route::post('/reinicioclave', [ReiniciarClaveController::class, 'resetpass'])->name('reset');
Route::get('/cambioclave', [ReiniciarClaveController::class, 'index'])->name('change');
Route::post('/cambioclave', [ReiniciarClaveController::class, 'ChangePass']);
