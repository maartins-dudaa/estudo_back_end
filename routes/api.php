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

Route::get('tarefa/get/all', [TarefaController::class, 'getAll']);

Route::get('tarefa/show/{id}', [TarefaController::class, 'show']);

Route::delete('tarefa/delete', [TarefaController::class, 'delete']);


Route::put('tarefa/update', [TarefaController::class, 'update']);

Route::get('tarefa/pesquisa/dia/mes', [TarefaController::class, 'pesquisarPorDiaEMes']);