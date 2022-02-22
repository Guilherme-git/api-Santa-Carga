<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function cadastrar(Request $request)
    {
        $horario = new Horario();
        $horario->afiliado = $request->id;
        $horario->semana = $request->semana;
        $horario->horario_inicio = $request->horario_inicio;
        $horario->horario_fim = $request->horario_fim;
        $horario->save();

        $horarios = Horario::where('afiliado','=',$request->id)->get();
        return response()->json(['message'=>'Salvo com sucesso','horarios'=>$horarios]);
    }

    public function mostrar(Request $request)
    {
        $horarios = Horario::where('afiliado','=',$request->id)->get();
        return response()->json($horarios);
    }

    public function remover(Request $request)
    {
        $horario = Horario::find($request->id);
        $horario->delete();

        $horarios = Horario::where('afiliado','=',$request->afiliado)->get();
        return response()->json($horarios);
    }
}
