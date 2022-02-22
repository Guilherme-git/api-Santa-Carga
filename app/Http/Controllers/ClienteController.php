<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cadastrar(Request $request)
    {
        $cliente = Cliente::where('cpf','=',$request->cpf)
            ->get();

        if($cliente->get(0) == null) {
            $cliente = new Cliente();
            $cliente->nome = $request->nome;
            $cliente->senha = $request->senha;
            $cliente->cpf = $request->cpf;
            $cliente->telefone = $request->telefone;
            $cliente->email = $request->email;
            $cliente->save();

            return response()->json(['message'=>"Salvo com sucesso"]);
        } else  {
            return response()->json(['message'=>"Esse CPF ja está cadastrado"]);
        }

    }
}
