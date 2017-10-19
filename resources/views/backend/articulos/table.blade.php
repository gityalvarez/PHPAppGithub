<table class="table table-responsive" id="articulos-table">
    <thead>
        <tr>
            <th>Stock</th>
        <th>Precio</th>
        <th>Producto Id</th>
        <th>Comercio Id</th>
        <th>Created At</th>
        <th>Updated At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($articulos as $articulo)
        <tr>
            <td>{!! $articulo->stock !!}</td>
            <td>{!! $articulo->precio !!}</td>
            <td>{!! $articulo->producto_id !!}</td>
            <td>{!! $articulo->comercio_id !!}</td>
            <td>{!! $articulo->created_at !!}</td>
            <td>{!! $articulo->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.articulos.destroy', $articulo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.articulos.show', [$articulo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.articulos.edit', [$articulo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>