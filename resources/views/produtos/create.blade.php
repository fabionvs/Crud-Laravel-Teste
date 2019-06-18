@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Produtos
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'produtos.store']) !!}

                        @include('produtos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script>
    $('input[name="valor"]').mask('000000.00', {reverse: true});
</script>
@endsection