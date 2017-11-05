<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $articulo->id !!}</p>
</div>

<!-- Stock Field -->
<div class="form-group">
    {!! Form::label('stock', 'Stock:') !!}
    <p>{!! $articulo->stock !!}</p>
</div>

<!-- Precio Field -->
<div class="form-group">
    {!! Form::label('precio', 'Precio:') !!}
    <p>{!! $articulo->precio !!}</p>
</div>

<!-- Producto Id Field -->
<div class="form-group">
    {!! Form::label('producto', 'Producto:') !!}
    <p>{!! $articulo->producto->nombre !!}</p>
</div>

<!-- Comercio Id Field -->
<div class="form-group">
    {!! Form::label('comercio', 'Comercio:') !!}
    <p>{!! $articulo->comercio->nombre !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $articulo->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $articulo->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $articulo->deleted_at !!}</p>
</div>

