<table class="table table-responsive" id="pedidos-table">
    <thead>
        <tr>
            <th>Total</th>
        <th>Estado</th>
        <th>Cliente Id</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pedidos as $pedido)
        <tr>
            <td>{!! $pedido->total !!}</td>
            <td>{!! $pedido->estado !!}</td>
            <td>{!! $pedido->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.pedidos.destroy', $pedido->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.pedidos.show', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.pedidos.edit', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Realmente está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>