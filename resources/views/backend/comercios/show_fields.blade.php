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
    <p>{!! $comercio->logo !!}</p>
</div>

<!-- Gerente Id Field -->
<div class="form-group">
    {!! Form::label('persona_id', 'Gerente Id:') !!}
    <p>{!! $comercio->persona_id !!}</p>
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

