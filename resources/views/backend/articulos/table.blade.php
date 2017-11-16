<table class="table table-responsive table-striped" id="articulos-table">    
        <tr>
            <th>Producto</th>            
            <th>Precio</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Comercio</th>
            <th colspan="3">Acciones</th>
        </tr>    
    @foreach($articulos as $articulo)
        <tr>
            <td>{!! $articulo->producto->nombre !!}</td>             
            <td>{!! $articulo->precio !!}</td> 
            <td>{!! $articulo->stock !!}</td>
            @if (!empty($articulo->producto->imagen))
                <td><img src="{{ asset('storage/'.$articulo->producto->imagen) }}" width="100" height="80"/></td>
            @else
                <td>Articulo sin imagen...</td>
            @endif
            <td>{!! $articulo->comercio->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.articulos.destroy', $articulo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.articulos.show', [$articulo->id]) !!}" class='btn btn-default'><i class="fa fa-eye"> Ver</i></a>
            
                    <a href="{!! route('backend.articulos.edit', [$articulo->id]) !!}" class='btn btn-default'><i class="fa fa-pencil"> Editar</i></a>
                    {!! Form::button('<i class="fa fa-trash"> Borrar</i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Realmente está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach    
</table>