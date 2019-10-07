<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Contatos extends Controller
{

    /**
     * Exibe todos os clientes cadastrados
     *
     * @return Response
     */
    public function index(){
        return Cliente::all();
    }

}
