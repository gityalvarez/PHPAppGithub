<table class="table table-responsive" id="comercios-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Direccion</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Logo</th>
        <th>Gerente Id</th>
        <th>Created At</th>
        <th>Updated At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($comercios as $comercio)
        <tr>
            <td>{!! $comercio->nombre !!}</td>
            <td>{!! $comercio->direccion !!}</td>
            <td>{!! $comercio->latitud !!}</td>
            <td>{!! $comercio->longitud !!}</td>
            <td>{!! $comercio->logo !!}</td>
            <td>{!! $comercio->persona_id !!}</td>
            <td>{!! $comercio->created_at !!}</td>
            <td>{!! $comercio->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.comercios.destroy', $comercio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.comercios.show', [$comercio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.comercios.edit', [$comercio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>