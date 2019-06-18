@extends('layouts.app')
@section('css')
    <style>
        .pt-2{
            padding-bottom: 10px
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Pedido # {!! $pedidos->id !!}
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div class="col-md-6">
                        @include('pedidos.show_fields')
                    </div>
                    <div class="col-md-6">
                        <h3>Endereço</h3>
                        @foreach(json_decode($pedidos->endereco) as $key => $produtos)
                            <div class="col-md-4 pt-2">
                                <label>{!! ucfirst($key) !!}</label>
                                <p>{!! $produtos !!}</p>
                            </div>
                        @endforeach
                        <h3>Produto</h3>
                        <div class="col-md-4">
                            <label>Id</label>
                            <p>{!! $pedidos->produto()->first()->id  !!}</p>
                        </div>
                        <div class="col-md-4">
                            <label>Nome</label>
                            <p>{!! $pedidos->produto()->first()->nome  !!}</p>
                        </div>
                        <div class="col-md-4">
                            <label>Status</label>
                            <p>@if($pedidos->produto()->first()->status == 1)Ativo @else Inativo @endif</p>
                        </div>
                    </div>
                </div>
                <a href="{!! route('pedidos.index') !!}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
@endsection
