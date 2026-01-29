<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function store(Request $request)
    {
        $cliente = Cliente::find($request->id_cliente);
        $produto = Produto::find($request->id_produto);
        if ($cliente->idade < $produto->faixa_etaria_minima){
            return response()->json(['erro' => 'Cliente não atinge a faixa etária mínima']);
        }

         $saida = Saida::create([
            'id_produto' => $request->id_produto,
            'id_cliente' => $request->id_cliente,
            'quantidade' => $request->quantidade
        ]);

        $produto = Produto::find($saida->id_produto);
        if ($produto == null) {
            return response()->json([
                'erro' => 'Produto não encontrado'
            ]);}

            if (isset($request->quantidade)) {
                $produto->quantidade_estoque -= $request->quantidade;
            }

            $produto->update();


            $saida->update();
            return response()->json('Estoque atualizado');
        }

    

    public function index()
    {
        $saidas = Saida::all();
        return response()->json($saidas);
    }

    public function delete($id)
    {
        $saida = Saida::find($id);
        $produto = Produto::find($saida->id_produto);

        if ($saida == null) {
            return response()->json([
                'erro' => 'Saída não encontrada'
            ]);
            
        }
             if (isset($request->quantidade)) {
                $produto->quantidade_estoque += $request->quantidade;
            }

        $produto->update();
        $saida->delete();
        return response()->json([
            'mensagem' => 'Saída excluída'
        ]);
    }
}
