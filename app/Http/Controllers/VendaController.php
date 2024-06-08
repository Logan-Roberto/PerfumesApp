<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexVenda()
    {
        $vendas = Venda::All();

        $contador = $vendas->count();

        return 'N° de Vendas: ' . $contador . '<br>' .  $vendas . Response()->json([], Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeVenda(Request $request)
    {
        $vendas = $request->All();

        $validacao = Validator::make($vendas, [
            'vendedor' =>  'required',
            'data' =>  'required',
            'quantidade' =>  'required',
            'fkComprador_idCli' =>  'required',
            'fkPerfume_codPerf' =>  'required'
        ]);

        if ($validacao->fails()) {
            return response()->json([
                'message' => 'Dados inválidos',
                'errors' => $validacao->errors()
            ], 500);
        }

        $cadastro = Venda::create($vendas);

        if ($cadastro) {
            return 'Venda cadastrada com sucesso '  . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return 'Venda não cadastrado ' . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Display the specified resource.
     */
    public function showVenda(string $id)
    {
        $vendas = Venda::find($id);

        if ($vendas) {
            return 'Venda detectada ' . $vendas;
        } else {
            return 'Venda desconhecida ' . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateVenda(Request $request, string $id)
    {
        $vendas = $request->All();

        $validacao = Validator::make($vendas, [
            'vendedor' =>  'required',
            'data' =>  'required',
            'quantidade' =>  'required',
            'fkComprador_idCli' =>  'required',
            'fkPerfume_codPerf' =>  'required'
        ]);

        if ($validacao->fails()) {
            return 'Dados inválidos' . $validacao->error(true) . 500;
        }

        $alteracao = Venda::find($id);
        $alteracao->vendedor = $vendas['vendedor'];
        $alteracao->data = $vendas['data'];
        $alteracao->quantidade = $vendas['quantidade'];
        $alteracao->fkComprador_idCli = $vendas['fkComprador_idCli'];
        $alteracao->fkPerfume_codPerf = $vendas['fkPerfume_codPerf'];

        $retorno = $alteracao->save();

        if ($retorno) {
            return 'Venda atualizada com sucesso ' . Response()->json([], Response::HTTP_NO_CONTENT);
        } else {
            return 'Venda não atualizada ' . Response()->json([], Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyVenda(string $id)
    {
        $vendas = Venda::find($id);

        if ($vendas->delete()) {
            return 'A venda foi deletada ' . response()->json([], Response::HTTP_NO_CONTENT);
        }

        return 'A venda não foi deletada ' . response()->json([], Response::HTTP_NO_CONTENT);
    }
}
