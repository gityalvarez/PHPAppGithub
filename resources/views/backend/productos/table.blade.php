<table class="table table-responsive" id="productos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Codigo</th>
        <th>Imagen</th>
        <th>Categoria</th>
        <th>Admin Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->nombre !!}</td>
            <td>{!! $producto->codigo !!}</td>
            @if (!empty($producto->imagen))
                <td><img src="{{ asset($producto->imagen) }}" width="100" height="50"/></td>
            @else
                <td>Producto sin imagen...</td>
            @endif
            <td>{!! $producto->categoria->nombre !!}</td>
            <td>{!! $producto->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.productos.destroy', $producto->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.productos.show', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.productos.edit', [$producto->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>