<?php

namespace App\Http\Controllers;

use App\Afiliado;
use App\Cupom;
use Illuminate\Http\Request;
use PDF;

class CupomController extends Controller
{
    public function cadastrar(Request $request)
    {
        $cupom = new Cupom();
        $cupom->nome = $request->nome;
        $cupom->desconto = $request->desconto;
        $cupom->data_criacao = date('Y-m-d');
        $cupom->data_encerrar = $request->data_encerrar;
        $cupom->afiliado = $request->afiliado;
        $cupom->save();

        return response()->json(['message'=>"Salvo com sucesso"]);
    }

    public function meusCupons(Request $request)
    {
        $cupom = Cupom::where('afiliado','=',$request->afiliado)->get();
        return $cupom;
    }

    public function listarCupons()
    {
        $cupom = Cupom::with('afiliado')->get();
        return $cupom;
    }

    public function PDF()
    {
        $cupons = Cupom::orderBy('id','DESC')->get();
        $afiliado = Afiliado::all();

        $pdf = PDF::loadView('pdf-todos-cupom',compact('cupons','afiliado'));
        return $pdf->setPaper('a4')->stream('Cupons.pdf');
    }
}
