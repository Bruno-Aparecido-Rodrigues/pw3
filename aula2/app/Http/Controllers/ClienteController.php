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
}
