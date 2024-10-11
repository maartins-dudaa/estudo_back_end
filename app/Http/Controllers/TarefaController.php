<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function cadastrar(Request $request)
    {
        $tarefa = Tarefa::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao

        ]);
         return response()->json([
            'status' => true,
            'message' => 'Cliente cadastrado',
            'data' => $tarefa
         ]);
    }


    public function findById($id){
        $tarefa = Tarefa::find($id);
        if($tarefa == null){
            return response()->json([
                'status' => false,
                'message' => 'Tarefa não encontrada'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $tarefa
        ]);
    }

    public function findByIdRequest(Request $request){
        $tarefa = Tarefa::find($request->id);
        if($tarefa == null){
            return response()->json([
                'status' => false,
                'message' => 'Tarefa não encontrada'
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $tarefa
        ]);

    }
    
}
