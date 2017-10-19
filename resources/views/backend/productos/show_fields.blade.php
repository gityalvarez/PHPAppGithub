<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $producto->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $producto->nombre !!}</p>
</div>

<!-- Codigo Field -->
<div class="form-group">
    {!! Form::label('codigo', 'Codigo:') !!}
    <p>{!! $producto->codigo !!}</p>
</div>

<!-- Imagen Field -->
<div class="form-group">
    {!! Form::label('imagen', 'Imagen:') !!}
    <p>{!! $producto->imagen !!}</p>
</div>

<!-- Categoria Id Field -->
<div class="form-group">
    {!! Form::label('categoria_id', 'Categoria Id:') !!}
    <p>{!! $producto->categoria_id !!}</p>
</div>

<!-- Administrador Id Field -->
<div class="form-group">
    {!! Form::label('persona_id', 'Administrador Id:') !!}
    <p>{!! $producto->persona_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $producto->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $producto->updated_at !!}</p>
</div>

