<!-- Producto Code Field -->
<div class="form-group">
    {!! Form::label('producto_code', 'Código:') !!}
    <p>{!! $articulo->producto->codigo !!}</p>
</div>

<!-- Producto Name Field -->
<div class="form-group">
    {!! Form::label('producto_name', 'Nombre:') !!}
    <p>{!! $articulo->producto->nombre !!}</p>
</div>

<!-- Producto Name Image -->
<div class="form-group">
    {!! Form::label('producto_image', 'Imagen:') !!}
    @if (!empty($articulo->producto->imagen))
        <p><img src="{{ asset($articulo->producto->imagen) }}" width="350" height="200"/></p>
    @else
        <p>Producto sin imagen...</p>
    @endif
</div>

<!-- Producto Category Field -->
<div class="form-group">
    {!! Form::label('producto_categoria_name', 'Categoría:') !!}
    <p>{!! $articulo->producto->categoria->nombre !!}</p>
</div>

<!-- Comercio Name Field -->
<div class="form-group">
    {!! Form::label('comercio_name', 'Comercio:') !!}
    <p>{!! $articulo->comercio->nombre !!}</p>
</div>

<!-- Comercio Image Field -->
<div class="form-group">
    {!! Form::label('comercio_logo', 'Logo:') !!}
    @if (!empty($articulo->comercio->logo))
        <p><img src="{{ asset($articulo->comercio->logo) }}" width="350" height="200"/></p>
    @else
        <p>Comercio sin logo...</p>
    @endif
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


