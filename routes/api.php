<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Link com o storage--------------
Route::get('storage-link',function (){
    return \Illuminate\Support\Facades\Artisan::call('storage:link');
});
//--------------------------------------

Route::post('esqueci-senha-email','EsqueciSenhaController@emailEsqueciSenha');
Route::post('alterar-senha','EsqueciSenhaController@alterarSenha');

Route::post('login','LoginController@login');
Route::post('login-cliente','LoginController@loginCliente');

Route::prefix('admin')->group(function (){
    Route::prefix('afiliado')->group(function (){
        Route::post('cadastrar','AfiliadoController@cadastrar');
        Route::get('listar','AfiliadoController@listar');
        Route::get('listar-proximos','AfiliadoController@listarProximos');
        Route::get('mostrar','AfiliadoController@mostrar');
        Route::post('editar','AfiliadoController@editar');
    });

    Route::prefix('categoria')->group(function (){
        Route::post('cadastrar','CategoriaController@cadastrar');
        Route::get('listar','CategoriaController@listar');
        Route::get('mostrar','CategoriaController@mostrar');
        Route::post('editar','CategoriaController@editar');
    });

    Route::prefix('cupom')->group(function (){
        Route::get('listar','CupomController@listarCupons');
        Route::get('pdf','CupomController@PDF');
    });

    Route::prefix('cupom-resgate')->group(function (){
        Route::get('listar','CupomResgateController@listarResgates');
        Route::get('pdf','CupomResgateController@PDF');
    });
});

Route::prefix('afiliado')->group(function (){
    Route::get('mostrar','AfiliadoController@mostrar');
    Route::post('salvar-informacoes-perfil','AfiliadoController@salvarInformacoesPerfil');
    Route::post('salvar-tipo-perfil','AfiliadoController@salvarTipoPerfil');
    Route::post('salvar-categoria-perfil','AfiliadoController@salvarCategoriaPerfil');

    Route::prefix('categoria')->group(function (){
        Route::get('listar','CategoriaController@listar');
    });

    Route::prefix('horario')->group(function (){
        Route::post('cadastrar','HorarioController@cadastrar');
        Route::get('mostrar','HorarioController@mostrar');
        Route::get('remover','HorarioController@remover');
    });

    Route::prefix('cupom')->group(function (){
        Route::post('cadastrar','CupomController@cadastrar');
        Route::get('meus-cupons','CupomController@meusCupons');
    });

    Route::prefix('cupom-resgate')->group(function (){
        Route::post('cadastrar','CupomResgateController@cadastrar');
        Route::get('meus-resgate','CupomResgateController@meusResgate');
    });
});

Route::prefix('cliente')->group(function (){
    Route::post('cadastrar','ClienteController@cadastrar');
});
