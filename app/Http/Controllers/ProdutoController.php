<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function store(Request $request)
    {
        $produto = Produto::create([
            'marca' => $request->marca,
            'descricao' => $request->descricao,
            'valor_unitario' => $request->valor_unitario,
            'quantidade_estoque' => $request->quantidade_estoque,
            'faixa_etaria_minima' => $request->faixa_etaria_minima
        ]);
        return response()->json($produto);
    }

    public function index()
    {
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function update(Request $request)
    {
        $produto = Produto::find($request->id);
        if ($produto == null) {
            return response()->json([
                'erro' => 'Produto não encontrado'
            ]);
        }
        $produto->update();

        return response()->json([
            'mensagem' => 'produto atualizado'
            ]);
    }

    public function delete($id)
    {
        $produto = Produto::find($id);

        if ($produto == null) {
            return response()->json([
                'erro' => 'Produto não encontrado'
            ]);
        }
        $produto->delete();
        return response()->json([
            'mensagem' => 'Produto excluído'
        ]);
    }
}
