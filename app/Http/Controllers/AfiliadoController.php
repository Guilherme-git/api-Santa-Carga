<?php

namespace App\Http\Controllers;

use App\Afiliado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AfiliadoController extends Controller
{
    public function cadastrar(Request $request)
    {
        $afiliado = Afiliado::where('email', '=', $request->email)->get();

        if ($afiliado->get(0) == null) {
            $afiliado = new Afiliado();
            $afiliado->nome = $request->nome;
            $afiliado->email = $request->email;
            $afiliado->cidade = $request->cidade;
            $afiliado->endereco = $request->endereco;
            $afiliado->contato = $request->contato;
            $afiliado->usuario = $request->usuario;
            $afiliado->senha = $request->senha;
            $afiliado->latitude = $request->latitude;
            $afiliado->longitude = $request->longitude;
            $afiliado->tipo = $request->tipo;
            $afiliado->categoria = $request->categoria;
            $afiliado->save();

            return response()->json(['message' => "Salvo com sucesso"]);
        } else {
            return response()->json(["message" => "Email já cadastrado, tente outro"]);
        }
    }

    public function listar()
    {
        $afiliados = Afiliado::with('categoria')
            ->with('horario')
            ->orderBy('nome', 'ASC')
            ->get();
        return response()->json($afiliados);
    }

    public function listarProximos(Request $request)
    {
        $afiliados = Afiliado::with('categoria')
            ->with('horario')
            ->where('cidade','=',$request->cidade)
            ->orderBy('nome', 'ASC')
            ->get();
        return response()->json($afiliados);
    }

    public function mostrar(Request $request)
    {
        $afiliado = Afiliado::find($request->id);
        return $afiliado;
    }

    public function editar(Request $request)
    {
        $afiliado = Afiliado::find($request->id);
        $afiliado->nome = $request->nome;
        $afiliado->email = $request->email;
        $afiliado->cidade = $request->cidade;
        $afiliado->endereco = $request->endereco;
        $afiliado->contato = $request->contato;
        $afiliado->usuario = $request->usuario;
        $afiliado->latitude = $request->latitude;
        $afiliado->longitude = $request->longitude;
        $afiliado->tipo = $request->tipo;
        $afiliado->save();

        return response()->json(['message' => "Editado com sucesso"]);
    }

    public function salvarInformacoesPerfil(Request $request)
    {
        if ($request->foto != "undefined") {
            $afiliado = Afiliado::find($request->id);
            Storage::delete($afiliado->foto);

            $afiliado->nome = $request->nome;
            $afiliado->email = $request->email;
            $afiliado->cidade = $request->cidade;
            $afiliado->endereco = $request->endereco;
            $afiliado->contato = $request->contato;
            $afiliado->usuario = $request->usuario;
            $afiliado->latitude = $request->latitude;
            $afiliado->longitude = $request->longitude;
            $afiliado->foto = $request->file("foto")->store('perfil_afiliado');
            $afiliado->sobre = $request->sobre;
            $afiliado->save();

            $afiliadoR = Afiliado::where('id','=',$request->id)
                ->with('categoria')
                ->get();

            return response()->json(['message' => "Editado com sucesso", "usuario" => $afiliadoR->get(0)]);
        } else {
            $afiliado = Afiliado::find($request->id);
            $afiliado->nome = $request->nome;
            $afiliado->email = $request->email;
            $afiliado->cidade = $request->cidade;
            $afiliado->endereco = $request->endereco;
            $afiliado->contato = $request->contato;
            $afiliado->usuario = $request->usuario;
            $afiliado->latitude = $request->latitude;
            $afiliado->longitude = $request->longitude;
            $afiliado->sobre = $request->sobre;
            $afiliado->save();

            $afiliadoR = Afiliado::where('id','=',$request->id)
                ->with('categoria')
                ->get();

            return response()->json(['message' => "Editado com sucesso", "usuario" => $afiliadoR->get(0)]);
        }
    }

    public function salvarTipoPerfil(Request $request)
    {
        $afiliado = Afiliado::find($request->id);
        $afiliado->tipo = $request->tipo;
        $afiliado->save();

        $afiliadoR = Afiliado::where('id','=',$request->id)
            ->with('categoria')
            ->get();

        return response()->json(['message' => "Editado com sucesso", "usuario" => $afiliadoR->get(0)]);
    }

    public function salvarCategoriaPerfil(Request $request)
    {
        $afiliado = Afiliado::find($request->id);
        $afiliado->categoria = $request->categoria;
        $afiliado->save();

        $afiliadoR = Afiliado::where('id','=',$request->id)
            ->with('categoria')
            ->get();

        return response()->json(['message' => "Salvo com sucesso", "usuario" => $afiliadoR->get(0)]);
    }
}
