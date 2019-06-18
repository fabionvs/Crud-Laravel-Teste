<div class="table-responsive">
    <table class="table" id="pedidos-table">
        <thead>
        <tr>
            <th>Produto</th>
            <th>Solicitante</th>
            <th>Quantidade</th>
            <th>Situação</th>
            <th>Valor</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedidos)
            <tr>
                <td>#@if($pedidos->produto()->first() != null){!! $pedidos->produto()->first()->id !!}
                    - {!! $pedidos->produto()->first()->nome !!}@endif</td>
                <td>{!! $pedidos->solicitante !!}</td>
                <td>{!! $pedidos->quantidade !!}</td>
                <td>
                    @if ($pedidos->situacao == 0)
                        <span class="label label-warning pull-right">Pendente de Envio</span>
                    @elseif ($pedidos->situacao == 1)
                        <span class="label label-default pull-right">Enviado</span>
                    @elseif ($pedidos->situacao == 2)
                        <span class="label label-success pull-right">Entregue</span>
                    @endif
                </td>
                <td>{!! $pedidos->valor !!}</td>
                <td>
                    {!! Form::open(['route' => ['pedidos.destroy', $pedidos->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pedidos.show', [$pedidos->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('pedidos.edit', [$pedidos->id]) !!}" class='btn btn-default btn-xs'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
