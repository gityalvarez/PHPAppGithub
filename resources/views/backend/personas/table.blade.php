<table class="table table-responsive" id="personas-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Created At</th>
        <th>Updated At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($personas as $persona)
        <tr>
            <td>{!! $persona->nombre !!}</td>
            <td>{!! $persona->apellido !!}</td>
            <td>{!! $persona->email !!}</td>
            <td>{!! $persona->latitud !!}</td>
            <td>{!! $persona->longitud !!}</td>
            <td>{!! $persona->created_at !!}</td>
            <td>{!! $persona->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.personas.destroy', $persona->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.personas.show', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('backend.personas.edit', [$persona->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>