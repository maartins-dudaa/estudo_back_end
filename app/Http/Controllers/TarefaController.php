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


    public function findById($id)
    {
        $tarefa = Tarefa::find($id);
        if ($tarefa == null) {
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

    public function findByIdRequest(Request $request)
    {
        $tarefa = Tarefa::find($request->id);
        if ($tarefa == null) {
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



    public function getAll()
    {
        $tarefa = Tarefa::all();
        return response()->json([
            'status' => true,
            'data' => $tarefa
        ]);
    }


    public function show($id)
    {
        $tarefa = Tarefa::find($id);
        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => 'Tarefa não encontrada',
                'data' => $tarefa
            ]);
        }
        return response()->json([
            'status' => true,
            'message' => 'Tarefa encontrada',
            'data' => $tarefa
        ]);
    }


    public function delete(Request $request)
    {
        $tarefa = Tarefa::find($request->id);
        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => 'tarefa não encontrada'
            ]);
        }
        $tarefa->delete();
        return response()->json([
            'status' => true,
            'message' => 'tarefa deletada',
            'data' => $tarefa
        ]);
    }



    public function update(Request $request)
    {
        $tarefa = Tarefa::find($request->id);
        if ($tarefa == null) {
            return response()->json([
                'status' => false,
                'message' => 'tarefa não encontrada'
            ]);
        }

        if (isset($request->titulo)) {
            $tarefa->titulo = $request->titulo;
        }
        if (isset($request->descricao)) {
            $tarefa->descricao = $request->descricao;
        }
        if (isset($request->status)) {
            $tarefa->status = $request->status;
        }
        $tarefa->update();
        return response()->json([
            'status' => true,
            'message' => 'tarefa atualizada',
            'data' => $tarefa
        ]);
    }

    public function pesquisarPorDiaEMes(Request $request)
    {
        $tarefa = Tarefa::whereMonth('created_at', '=', $request->mes)->whereDay('created_at', '=', $request->dia)->get();
        if ($tarefa->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'sem resultados para a pesquisa'
            ]);
        }
        return response()->json([
            'status' => true,
            'data' => $tarefa
        ]);
    }
}
