<table class="table table-responsive" id="categorias-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
            <td>{!! $categoria->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.categorias.destroy', $categoria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.categorias.show', [$categoria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.categorias.edit', [$categoria->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Realmente está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>