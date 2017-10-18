<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $persona->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $persona->nombre !!}</p>
</div>

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $persona->apellido !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $persona->email !!}</p>
</div>

<!-- Latitud Field -->
<div class="form-group">
    {!! Form::label('latitud', 'Latitud:') !!}
    <p>{!! $persona->latitud !!}</p>
</div>

<!-- Longitud Field -->
<div class="form-group">
    {!! Form::label('longitud', 'Longitud:') !!}
    <p>{!! $persona->longitud !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $persona->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $persona->updated_at !!}</p>
</div>

