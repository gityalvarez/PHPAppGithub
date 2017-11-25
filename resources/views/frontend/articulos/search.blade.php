{!! Form::model(Request::only(['nombre', 'categoriaident', 'rangoprecios']), ['url' => 'frontend/'.$url, 'method' => 'get', 'class' => 'form-inline']) !!}
<div class="form-group {!! $errors->has('search') ? 'has-error' : '' !!}">Nombre:
    {!! Form::text('nombre', isset($nombre) ? $nombre : null, ['class'=>'form-control', 'placeholder' => 'Ingrese Producto']) !!}        
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">Categoría:           
    {!! Form::select('categoriaident', ['0' => 'Elija categoría'] + $categorias, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">Rango Precios:   
    {!! Form::select('rangoprecios', ['0' => 'Elija rango', '1' => '1 - 300', '2' => '301 - 600', '3' => '601 - 900', '4' => '901 - 1200', '5' => '1201 - 1500', '6' => '1501 - 1800', '7' => '1801 - 2100', '8' => 'Mayor a 2100'], null, ['class'=>'form-control']) !!}
</div>
{!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}