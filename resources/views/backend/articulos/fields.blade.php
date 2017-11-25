<!-- Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stock', 'Stock:') !!}
    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Precio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('precio', 'Precio:') !!}
    {!! Form::number('precio', null, ['class' => 'form-control']) !!}
</div>

<!-- Producto Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('producto_id', 'Producto:') !!}
    {!! Form::select('producto_id', $productos, null, ['class' => 'form-control']) !!}   
</div>

<!-- Comercio Id Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('comercio_id', $comercio->id) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.articulos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
