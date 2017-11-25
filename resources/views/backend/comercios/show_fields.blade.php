<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $comercio->id !!}</p>
</div>

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

<!-- Latitud Field -->
<div class="form-group">
    {!! Form::label('latitud', 'Latitud:') !!}
    <p>{!! $comercio->latitud !!}</p>
</div>

<!-- Longitud Field -->
<div class="form-group">
    {!! Form::label('longitud', 'Longitud:') !!}
    <p>{!! $comercio->longitud !!}</p>
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

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $comercio->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $comercio->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $comercio->deleted_at !!}</p>
</div>

