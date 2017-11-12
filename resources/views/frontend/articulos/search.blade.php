{!! Form::open(['url' => 'frontend/'.$url, 'method' => 'get', 'class' => 'form-inline']) !!}
<div class="form-group {!! $errors->has('search') ? 'has-error' : '' !!}">Nombre:
 	{!! Form::text('nombre', isset($nombre) ? $nombre : null, ['class'=>'form-control', 'placeholder' => 'Ingrese Producto']) !!}        
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">Categoría:           
    <select name="categoriaident" class="form-control">
        @foreach($categorias as $categoria)
        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
        @endforeach
        <option value="0" selected="selected">Elija Categoría</option>
    </select>
</div>
<div class="form-group">Rango Precios:           
    <select name="rangoprecios" class="form-control">
        <option value="1">1 - 300</option>
        <option value="2">301 - 600</option>
        <option value="3">601 - 900</option>
        <option value="4">901 - 1200</option>
        <option value="5">1201 - 1500</option>
        <option value="6">1501 - 1800</option>
        <option value="7">1801 - 2100</option>
        <option value="8">Mayor a 2100</option>
        <option value="0" selected="selected">Elija rango</option>
    </select>
</div>
{!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!}