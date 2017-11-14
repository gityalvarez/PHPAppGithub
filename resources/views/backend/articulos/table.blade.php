<table class="table table-responsive table-striped" id="articulos-table">    
        <tr>
            <th>Stock</th>
            <th>Precio</th>
            <th>Producto</th>
            <th>Comercio</th>
            <th colspan="3">Acciones</th>
        </tr>    
    @foreach($articulos as $articulo)
        <tr>
            <td>{!! $articulo->stock !!}</td>
            <td>{!! $articulo->precio !!}</td>
            <td>{!! $articulo->producto->nombre !!}</td>
            <td>{!! $articulo->comercio->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.articulos.destroy', $articulo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.articulos.show', [$articulo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"> Ver</i></a>
                    <a href="{!! route('backend.articulos.edit', [$articulo->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-pencil"> Editar</i></a>
                    {!! Form::button('<i class="fa fa-trash"> Borrar</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Realmente está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach    
</table>