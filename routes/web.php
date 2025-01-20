<?php

use App\Http\Controllers\CertificadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CertificadoController::class, 'listar'])->name('listar');
Route::get('/visualizar/{treinamento}', [CertificadoController::class, 'visualizar'])->name('visualizar');
Route::get('/treinamento', [CertificadoController::class, 'treinamento'])->name('treinamento');
Route::post('/cadastrar', [CertificadoController::class, 'cadastrar'])->name('cadastrar');
Route::get('/editar/{treinamento}', [CertificadoController::class, 'editar'])->name('editar');
Route::put('/update/{treinamento}', [CertificadoController::class, 'update'])->name('update');
Route::delete('/destroy/{treinamento}', [CertificadoController::class, 'destroy'])->name('destroy');


