<table class="table table-responsive table-striped" id="comercios-table">
    
        <tr>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Latitud</th>
            <th>Longitud</th>
            <th>Logo</th>
            <th>Id de Gerente </th>
            <th colspan="3">Acciones</th>
        </tr>    
    @foreach($comercios as $comercio)
        <tr>
            <td>{!! $comercio->nombre !!}</td>
            <td>{!! $comercio->direccion !!}</td>
            <td>{!! $comercio->latitud !!}</td>
            <td>{!! $comercio->longitud !!}</td>
            @if (!empty($comercio->logo))
                <td><img src="{{ asset('storage/'.$comercio->logo) }}" width="100" height="50"/></td>
            @else
                <td>Comercio sin logo...</td>
            @endif
            <td>{!! $comercio->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['backend.comercios.destroy', $comercio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('backend.comercios.show', [$comercio->id]) !!}" class='btn btn-default'><i class="fa fa-eye"> Ver</i></a>
                    <a href="{!! route('backend.comercios.edit', [$comercio->id]) !!}" class='btn btn-default'><i class="fa fa-pencil"> Editar</i></a>
                    {!! Form::button('<i class="fa fa-trash">  Borrar</i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Realmente está seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach    
</table>