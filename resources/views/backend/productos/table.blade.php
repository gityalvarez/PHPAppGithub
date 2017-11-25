<table class="table table-responsive table-striped" id="productos-table">    
        <tr>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Imagen</th>
            <th>Categoria</th>
            <!--<th>Admin Id</th>-->
            <th colspan="3">Acciones</th>
        </tr>
    
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->nombre !!}</td>
            <td>{!! $producto->codigo !!}</td>
            @if (!empty($producto->imagen))
                <td><img src="{{ asset('storage/'.$producto->imagen) }}" width="100" height="80"/></td>
            @else
                <td>Producto sin imagen...</td>
            @endif
            <td>{!! $producto->categoria->nombre !!}</td>
            <!--<td>{!! $producto->user_id !!}</td>-->
            <td>
                {!! Form::open(['route' => ['backend.productos.destroy', $producto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.productos.show', [$producto->id]) !!}" class='btn btn-default'><i class="fa fa-eye"> Ver</i></a>
                    <a href="{!! route('backend.productos.edit', [$producto->id]) !!}" class='btn btn-default'><i class="fa fa-pencil"> Editar</i></a>
                    {!! Form::button('<i class="fa fa-trash"> Borrar</i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Realmente está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach   
</table>