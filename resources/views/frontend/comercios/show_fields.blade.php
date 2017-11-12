<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $comercio->nombre !!}</p>
</div>

<!-- Direccion Field -->
<div class="form-group">
    {!! Form::label('direccion', 'Direccion:') !!}
    <p>{!! $comercio->direccion !!}</p>
</div>

<!-- Logo Field -->
<div class="form-group">
    {!! Form::label('logo', 'Logo:') !!}
    @if (!empty($comercio->logo))
        <p><img src="{{ asset('storage/'.$comercio->logo) }}" width="350" height="200"/></p>
    @else
        <p>Comercio sin logo...</p>
    @endif
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Gerente Id:') !!}
    <p>{!! $comercio->user_id !!}</p>
</div>


