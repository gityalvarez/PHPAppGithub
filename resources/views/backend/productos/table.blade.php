<table class="table table-responsive" id="productos-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Codigo</th>
        <th>Imagen</th>
        <th>Categoria Id</th>
        <th>Administrador Id</th>
        <th>Created At</th>
        <th>Updated At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($productos as $producto)
        <tr>
            <td>{!! $producto->nombre !!}</td>
            <td>{!! $producto->codigo !!}</td>
            <td>{!! $producto->imagen !!}</td>
            <td>{!! $producto->categoria_id !!}</td>
            <td>{!! $producto->persona_id !!}</td>
            <td>{!! $producto->created_at !!}</td>
            <td>{!! $producto->updated_at !!}</td>
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