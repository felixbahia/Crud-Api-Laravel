<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class ClientesController extends Controller
{
    public function index(){
        $clientes = Cliente::get();

        return view('clientes.lista', ['clientes' => $clientes]);
    }
    public function novo(){
        return view('clientes.formulario');

}
    public function salvar(Request $request){
        $cliente = new Cliente();
        $cliente = $cliente->create($request->all());
        \Session::flash('mensagem_sucesso', 'Cliente Cadastrado com Sucesso!');
        return Redirect::to('clientes/novo');
    }

    public function editar($id){
        $cliente = Cliente::findOrfail($id);
        return view('clientes.formulario', ['clientes' => $cliente]);

    }

    public function atualizar($id, Request $request) {
        $cliente = Cliente::findOrfail($id);
        $cliente->update($request->all());
        \Session::flash('mensagem_sucesso', 'Cadastro Atualizado com Sucesso!');
        return Redirect::to('clientes/'.$cliente->id.'/editar');
    }
    public function deletar($id){
        $cliente = Cliente::findOrfail($id);
        $cliente->delete();
        \Session::flash('mensagem_sucesso', 'Cliente Deletado com Sucesso!');
        return Redirect::to('clientes');
    }
}
