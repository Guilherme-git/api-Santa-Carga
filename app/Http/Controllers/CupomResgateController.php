<?php

namespace App\Http\Controllers;

use App\Afiliado;
use App\Cliente;
use App\Cupom;
use App\CupomResgate;
use Illuminate\Http\Request;
use PDF;

class CupomResgateController extends Controller
{
    public function cadastrar(Request $request)
    {
        $cliente = Cliente::where('cpf','=',$request->cpf)
            ->get();

        if($cliente->get(0) == null)
        {
            return response()->json(['message'=>"Cliente não cadastrado"]);
        } else {
            $cupomResgate = CupomResgate::where('cliente','=',$cliente->get(0)->id)
                ->where('afiliado','=',$request->afiliado)
                ->where('cupom','=',$request->cupom)
                ->get();

            if($cupomResgate->get(0) == null) {
                $cupomResgate = new CupomResgate();
                $cupomResgate->data_resgate = date('Y-m-d');
                $cupomResgate->cupom = $request->cupom;
                $cupomResgate->cliente = $cliente->get(0)->id;
                $cupomResgate->afiliado = $request->afiliado;
                $cupomResgate->save();

                return response()->json(['message'=>"Salvo com sucesso"]);
            } else {
                return response()->json(['message'=>"Esse cliente já utilizou esse cupom"]);
            }
        }
    }

    public function meusResgate(Request $request)
    {
        $cupomResgate = CupomResgate::where('afiliado','=',$request->afiliado)
            ->with('cupom')
            ->with('cliente')
            ->orderBy('id','DESC')
            ->get();
        return $cupomResgate;
    }

    public function listarResgates()
    {
        $cupomResgate = CupomResgate::with('afiliado')
            ->with('cupom')
            ->with('cliente')
            ->orderBy('id','DESC')
            ->get();
        return $cupomResgate;
    }

    public function PDF()
    {
        $cuponsResgate = CupomResgate::orderBy('id','DESC')->get();
        $cupons = Cupom::all();
        $afiliado = Afiliado::all();
        $cliente = Cliente::all();

        $pdf = PDF::loadView('pdf-todos-cupom-resgatado',compact('cupons','afiliado','cliente','cuponsResgate'));
        return $pdf->setPaper('a4')->stream('Cupons-resgatados.pdf');
    }
}
