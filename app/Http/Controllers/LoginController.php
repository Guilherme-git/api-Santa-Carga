<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Afiliado;
use App\Cliente;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $admin = Admin::where('usuario', '=', $request->usuario)
            ->where('senha', '=', $request->senha)
            ->get();

        if ($admin->get(0) != null) {
            return response()->json([
                "usuario" => $admin->get(0),
                "tipo" => "admin",
                "message" => "ok"
            ]);
        } else {
            $afiliado = Afiliado::where('usuario', '=', $request->usuario)
                ->where('senha', '=', $request->senha)
                ->with('categoria')
                ->get();

            if ($afiliado->get(0) != null) {
                return response()->json([
                    "usuario" => $afiliado->get(0),
                    "tipo" => "afiliado",
                    "message" => "ok"
                ]);
            } else {
                return response()->json(['message' => "Você não está cadastrado"]);
            }
        }
    }

    public function loginCliente(Request $request)
    {
        //return "a";
        $cliente = Cliente::where('cpf','=',$request->cpf)
            ->where('senha','=',$request->senha)
            ->get();

        if($cliente->get(0) != null) {
            return $cliente->get(0);
        } else {
            return response()->json(['message' => "Você não está cadastrado"]);
        }


    }
}
