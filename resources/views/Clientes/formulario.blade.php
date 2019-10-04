@extends('layouts.app')
@if(Auth::user())
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Informe abaixo as informações do cliente
                        <a class="float-right"  href="{{url ('clientes')}}">Listagem de Clientes </a>
                    </div>
                    <div class="card-body">

                        @if (session('mensagem_sucesso'))
                            <div class="alert alert-success" role="alert">
                                {{ \Illuminate\Support\Facades\Session::get('mensagem_sucesso') }}
                            </div>
                            @endif

                            @if(Request::is('*/editar'))
                                <form method="post" action="{{ action('ClientesController@atualizar', $clientes->id) }}">
                                    @csrf
                                    <form class="form-group">
                                        <a class="float-left">Nome: </a>&nbsp
                                        <input class="form-control"  placeholder="Preencha este campo" name="nome" autofocus type="text" value="{{$clientes->nome}}">
                                        <a class="float-left">Endereço: </a>&nbsp
                                        <input class="form-control" placeholder="Preencha este campo" name="endereco" autofocus type="text" value="{{$clientes->endereco}}">
                                        <a class="float-left">Número: </a>&nbsp
                                        <input class="form-control" placeholder="Preencha este campo" name="numero" autofocus type="text" value="{{$clientes->numero}}">
                                        <p></p>
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                    </form>
                                    @else
                                         <form method="post" action="{{route('salvar')}}">
                                            @csrf
                                            <form class="form-group">
                                                <a class="float-left">Nome: </a>&nbsp
                                                <input class="form-control"  placeholder="Preencha este campo" name="nome" autofocus type="text" value="">
                                                <a class="float-left">Endereço: </a>&nbsp
                                                <input class="form-control" placeholder="Preencha este campo" name="endereco" autofocus type="text" value="">
                                                <a class="float-left">Número: </a>&nbsp
                                                <input class="form-control" placeholder="Preencha este campo" name="numero" autofocus type="text" value="">
                                                <p></p>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </form>


                            @endif







</div>
</div>
</div>
</div>
</div>
</div>
@endsection
@endif
