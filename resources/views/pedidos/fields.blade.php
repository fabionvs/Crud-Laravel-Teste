<!-- Quantidade Field -->
<div class="row">
    <div class="form-group col-sm-3">
        {!! Form::label('quantidade', 'Quantidade:') !!}
        {!! Form::number('quantidade', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-3">
        {!! Form::label('valor', 'Valor:') !!}
        {!! Form::text('valor', null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('solicitante', 'Solicitante:') !!}
        {!! Form::text('solicitante', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-sm-6">
        {!! Form::label('despachante', 'Despachante:') !!}
        {!! Form::text('despachante', null, ['class' => 'form-control']) !!}
    </div>
</div>
<h3>Endereço</h3>
<div class="row">
    @foreach(json_decode($pedidos->endereco) as $key => $end)
        <div class="col-md-4 pt-2">
            <label>{!! ucfirst($key) !!}</label>
            <p><input class="form-control" name="endereco[{{$key}}]" type="text" value="{{$end}}"></p>
        </div>
    @endforeach
</div>
<h3>Situação</h3>
<div class="row">
    <div class="form-group col-sm-6">
        {!! Form::label('situacao', 'Produto:') !!}
        {!! Form::select('situacao', ["Pendente de Envio", "Enviado", "Entregue"], $pedidos->situacao, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pedidos.index') !!}" class="btn btn-default">Cancel</a>
</div>
