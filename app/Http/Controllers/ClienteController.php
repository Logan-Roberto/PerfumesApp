<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexCliente()
    {
        $clientes = Cliente::All();

        $contador = $clientes->count();

        return 'N° de Clientes: ' . $contador . '<br>' .  $clientes . Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeCliente(Request $request)
    {
        $clientes = $request->All();

        $validacao = Validator::make($clientes, [
            'nome' =>  'required',
            'cpf' =>  'required',
            'endereco' =>  'required'
        ]);

        if ($validacao->fails()) {
            return response()->json([
                'message' => 'Dados inválidos',
                'errors' => $validacao->errors()
            ], 500);
        }

        $cadastro = Cliente::create($clientes);

        if ($cadastro) {
            return 'Cliente cadastrado com sucesso'  . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return 'Cliente não cadastrado ' . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showCliente(string $id)
    {
        $clientes = Cliente::find($id);

        if ($clientes) {
            return 'Cliente detectado ' . $clientes;
        } else {
            return 'Cliente desconhecido ' . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCliente(Request $request, string $id)
    {
        $clientes = $request->all();

        $validacao = Validator::make($clientes, [
            'nome' =>  'required',
            'cpf' =>  'required',
            'endereco' =>  'required'
        ]);

        if ($validacao->fails()) {
            return 'Dados inválidos' . $validacao->error(true) . 500;
        }

        $alteracao = Cliente::find($id);
        $alteracao->nome = $clientes['nome'];
        $alteracao->cpf = $clientes['cpf'];
        $alteracao->endereco = $clientes['endereco'];

        $retorno = $alteracao->save();

        if ($retorno) {
            return 'Cliente atualizado com sucesso ' . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return 'Cliente não atualizado ' . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyCliente(string $id)
    {
        $clientes = Cliente::find($id);

        if ($clientes->delete()) {
            return 'O cliente foi deletado ' . response()->json([], Response::HTTP_NO_CONTENT);
        }

        return 'O cliente não foi deletado ' . response()->json([], Response::HTTP_NO_CONTENT);
    }
}
