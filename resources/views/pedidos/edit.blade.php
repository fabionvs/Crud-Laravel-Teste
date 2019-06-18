@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alterar Pedido #{{$pedidos->id}}
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="col-md-6 col-md-offset-3">
            <div class="box box-primary">
                <div class="box-body">
                    {!! Form::model($pedidos, ['route' => ['pedidos.update', $pedidos->id], 'method' => 'patch']) !!}

                    @include('pedidos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection