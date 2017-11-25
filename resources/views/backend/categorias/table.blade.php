<table class="table table-responsive table-striped" id="categorias-table">    
        <tr>
            <th>Nombre</th>
            <th colspan="3">Acciones</th>
        </tr>   
    @foreach($categorias as $categoria)
        <tr>
            <td>{!! $categoria->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.categorias.destroy', $categoria->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.categorias.show', [$categoria->id]) !!}" class='btn btn-default'><i class="fa fa-eye"> Ver</i></a>
                    <a href="{!! route('backend.categorias.edit', [$categoria->id]) !!}" class='btn btn-default'><i class="fa fa-pencil"> Editar</i></a>
                    {!! Form::button('<i class="fa fa-trash"> Borrar</i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Realmente está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>