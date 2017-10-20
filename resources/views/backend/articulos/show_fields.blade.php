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
    {!! Form::label('producto_id', 'Producto Id:') !!}
    <p>{!! $articulo->producto_id !!}</p>
</div>

<!-- Comercio Id Field -->
<div class="form-group">
    {!! Form::label('comercio_id', 'Comercio Id:') !!}
    <p>{!! $articulo->comercio_id !!}</p>
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

