<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store (Request $request)
    {
        $cliente = Cliente::create([
        'nome' => $request->nome,
        'cpf' => $request->cpf,
        'idade' => $request->idade,
        ]);
        return response()->json($cliente);
    }

    public function index()
    {
        $clientes = Cliente::all();
        return response()->json($clientes);
    }

    public function update(Request $request)
    {
        $cliente = Cliente::find($request->id);
        if ($cliente == null) {
            return response()->json([
                'erro' => 'cliente não encontrado'
            ]);
         $cpf = $request->cpf;
        if($cpf == 'cpf'){
            return response()->json([
                'erro' => 'CPF já cadastrado'
            ]);
        }
        }
        $cliente->update();

        return response()->json([
            'mensagem' => 'cliente atualizado'
            ]);
    }

    public function delete($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente == null) {
            return response()->json([
                'erro' => 'cliente não encontrado'
            ]);
        }
        $cliente->delete();
        return response()->json([
            'mensagem' => 'cliente excluído'
        ]);
    }


}
