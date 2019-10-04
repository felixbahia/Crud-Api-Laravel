@extends('layouts.app')
@if(Auth::user())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Clientes
                        <a class="float-right"  href="{{url ('clientes/novo')}}">Novo Cliente </a>
                    </div>
                    <div class="card-body">
                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ \Illuminate\Support\Facades\Session::get('mensagem_sucesso') }}
                            </div>
                        @endif

                        <table class="table">
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Número</th>
                            <th>Ações</th>
                            <tdbody>
                                @foreach($clientes as $clientes)
                                <tr>
                                    <td>{{$clientes->nome}}</td>
                                    <td>{{$clientes->endereco}}</td>
                                    <td>{{$clientes->numero}}</td>
                                    <td>
                                        <a href="clientes/{{$clientes->id}}/editar" class="btn btn-outline-secondary btn-sm">Editar</a>

                                        <form method="post" style="display: inline" action="{{ action('ClientesController@deletar', $clientes->id) }}">
                                            @csrf
                                        <button type="submit" class="btn btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                    @endforeach
                            </tdbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif
