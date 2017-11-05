<table class="table table-responsive" id="comercios-table">
    <thead>
        <tr>
            <th>Nombre</th>
        <th>Direccion</th>
        <th>Latitud</th>
        <th>Longitud</th>
        <th>Logo</th>
        <th>Gerente Id</th>
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
            @if (!empty($comercio->logo))
                <td><img src="{{ asset($comercio->logo) }}" width="100" height="50"/></td>
            @else
                <td>Comercio sin logo...</td>
            @endif
            <td>{!! $comercio->user_id !!}</td>
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