<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::number('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('imagen', 'Imagen:') !!}
    {!!Form::file('imagen_producto',['class'=>'form-control'])!!}
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categoria_id', 'Categoria:') !!}<p></p>
    {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
</div>    

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::hidden('user_id', Auth::id()) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.productos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
