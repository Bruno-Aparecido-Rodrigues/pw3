<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index(Request $req){
        $cliente = Cliente::all();
        return  view('pagina_cadastro')->with("cliente",$cliente);
    }
    public function adicionar(Request $req){
        $cliente = new Cliente;
        $cliente->nome = $req->nome;
        $cliente->telefone = $req->telefone;
        $cliente->origem = $req->origem;
        $cliente->data_de_contato = $req->data_de_contato;
        $cliente->observacao = $req->observacao;
        $cliente->save();
        return redirect()->back();
    }

    public function editar($id){ // vai procurar na tabela o id e enviar tudo que tem nela para a tela, tipo um visualisar
        $cliente = Cliente::find($req->id);
        return view('editar')->with("cliente", $cliente);
    }

    public function atualizar(Request $req){ // vai atualizar os dados que foram mostrados e editados 
        $cliente = Cliente::find($req->id);
        $cliente->update(
            [
                "nome" => $req->nome,
                "telefone" => $req->telefone,
                "origem" => $req->origem,
                "data_de_contato" => $req->data_de_contato,
                "observacao" => $req->observacao

            ]
         );
            return redirect()->back();

    }

    public function excluir(Request $req){
        $cliente = Cliente::find($req->id);
        $cliente->delete();
        return redirect()->back();
    }
}
