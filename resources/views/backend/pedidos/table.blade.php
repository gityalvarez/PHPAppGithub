<table class="table table-responsive table-striped" id="pedidos-table">    
        <tr>
            <th>Total</th>
            <th>Estado</th>
            <th>Cliente Id</th>
            <th colspan="3">Acciones</th>
        </tr>    
    @foreach($pedidos as $pedido)
        <tr>
            <td>{!! $pedido->total !!}</td>
            <td>{!! $pedido->estado !!}</td>
            <td>{!! $pedido->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.pedidos.destroy', $pedido->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.pedidos.show', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-eye"> Ver</i></a>
                    <a href="{!! route('backend.pedidos.edit', [$pedido->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-pencil"> Editar</i></a>
                    {!! Form::button('<i class="fa fa-trash"> Borrar</i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Realmente está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach    
</table>