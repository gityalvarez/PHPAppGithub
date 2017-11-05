<table class="table table-responsive" id="comercios-table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Dirección</th>
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
            @if (!empty($comercio->logo))
                <td><img src="{{ asset($comercio->logo) }}" width="100" height="50"/></td>
            @else
                <p>El comercio no tiene logo...</p>
            @endif
            <td>{!! $comercio->user_id !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('frontend.comercios.show', [$comercio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>                    
                </div>                
            </td>
        </tr>
    @endforeach
    </tbody>
</table>