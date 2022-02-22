<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function cadastrar(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nome = $request->nome;

        $categoria->save();
        return response()->json(['message' => "Salvo com sucesso"]);
    }

    public function listar()
    {
        $categoria = Categoria::orderBy('nome','ASC')->get();
        return $categoria;
    }

    public function mostrar(Request $request)
    {
        $categoria = Categoria::find($request->id);
        return $categoria;
    }

    public function editar(Request $request)
    {
        $categoria = Categoria::find($request->id);
        $categoria->nome = $request->nome;

        $categoria->save();
        return response()->json(['message' => "Editado com sucesso"]);
    }
}
