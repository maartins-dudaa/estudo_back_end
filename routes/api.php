<?php

use App\Http\Controllers\TarefaController;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('tarefa/cadastro', [TarefaController::class,  'cadastrar']);

Route::get('tarefa/{id}', [TarefaController::class, 'findById']);

Route::get('tarefa/find/id', [TarefaController::class, 'findByIdRequest']);
