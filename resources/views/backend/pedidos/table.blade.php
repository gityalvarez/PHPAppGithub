<table class="table table-responsive table-striped" id="pedidos-table">    
        <tr>
            <th>Número</th>
            <th>Estado</th>
            <th>Total</th>
            <th>Cliente</th>
            <th colspan="3">Acciones</th>
        </tr>    
    @foreach($pedidos as $pedido)
        <tr>
            <td>{!! $pedido->id !!}</td>
            <td>{!! $pedido->estado !!}</td>
            <td>{!! $pedido->total !!}</td>
            <td>{!! App\User::find($pedido->user_id)->name !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.pedidos.destroy', $pedido->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.pedidos.show', [$pedido->id]) !!}" class="btn btn-default"><i class="fa fa-eye"> Ver</i></a>
                    @if ($user -> hasRole('gerente'))
                    <a href="{!! route('backend.pedidos.edit', [$pedido->id]) !!}" class="btn btn-default"><i class="fa fa-pencil"> Editar</i></a>
                    {!! Form::button('<i class="fa fa-trash"> Borrar</i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Realmente está seguro?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach    
</table>