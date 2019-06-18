<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $produtos->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $produtos->nome !!}</p>
</div>

<!-- Valor Field -->
<div class="form-group">
    {!! Form::label('valor', 'Valor:') !!}
    <p>{!! $produtos->valor !!}</p>
</div>

<!-- Quantidade Field -->
<div class="form-group">
    {!! Form::label('quantidade', 'Quantidade:') !!}
    <p>{!! $produtos->quantidade !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}<br>
    @if ($produtos->status == 1)
        <span class="label label-success">Ativo</span>
    @elseif ($produtos->status == 1)
        <span class="label label-danger">Inativo</span>
    @endif
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $produtos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $produtos->updated_at !!}</p>
</div>

