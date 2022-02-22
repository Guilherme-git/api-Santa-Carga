<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EsqueciSenhaController extends Controller
{
    public function emailEsqueciSenha(Request $request)
    {
        $usuario = Cliente::where('email', '=', $request->email)->get();

        if ($usuario->get(0) == null) {
            return response()->json(['message' => "Esse email não está cadastrado"]);
        } else {
            session()->put('email', $request->email);
            Mail::send('alterar-senha-email', ["email" => "enviado"], function ($e) {
                $e->from('contato.santacarga@gmail.com', 'Santa carga');
                $e->subject("Alterar sua senha");
                $e->to(session()->get('email'));
            });
            return response()->json(['message' => "Email enviado"]);
        }
    }

    public function alterarSenha(Request $request)
    {
        $usuario = Cliente::where('email', '=', $request->email)->get();

        if ($usuario->get(0) == null) {
            echo "<script> alert('Esse email não está cadastrado')
            history.go(-1)
        </script>";
        } else {
            $usuario = Cliente::find($usuario->get(0)->id);
            $usuario->senha = $request->senha;
            $usuario->save();
            echo "<script> alert('Senha Alterada')
            history.go(-1)
        </script>";
        }
    }
}
