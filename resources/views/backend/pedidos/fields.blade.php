<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
        $(document).on('change','.cantidad',function () {
            var total = 0;
            $('.item').each(function () {        
                cantidad = parseInt($(this).find('.cantidad').val(),10) || 0;
                precio = parseInt($(this).find('.precio').val(),10) || 0;
                total += cantidad * precio;        
            });
            $('.total').html(total);
        });
});
</script>

<!-- Cliente Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente: ') !!}
    {!! Form::select('cliente_id', $clientes, null, ['class' => 'form-control']) !!}    
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('articulos', 'Articulos:') !!}
<div style="margin:0px; padding:6px; width:100%; margin-bottom: 10px; height:270px; overflow:auto">
<table class="table table-responsive table-striped" id="articles">
        <div style="display:block; position:fixed">
        <tr>
            <th></th>
            <th>Stock</th>
            <th>Precio</th>
            <th>Producto</th>
            <th>Imagen</th>
            <th>Cantidad</th>
        </tr>
        </div>
     <tbody>        
    @foreach($articulos as $articulo)           
        <tr class="item">
            <td> <input type="hidden" name="articulos[]" class="form-control" value="{!! $articulo->id !!}"></td>
            <td> <input type="text" name="stocks[]" class="form-control" value="{!! $articulo->stock !!}" readonly="readonly" size="1"></td>
            <td> <input type="text" name="precios[]" class="form-control precio" value="{!! $articulo->precio !!}" readonly="readonly" size="2"></td>
            <td>{!! $articulo->producto->nombre !!}</td>
            @if (!empty($articulo->producto->imagen))
                <td><img src="{{ asset('storage/'.$articulo->producto->imagen) }}" width="100" height="80"/></td>
            @else
                <td>Articulo sin imagen...</td>
            @endif
            <td><input name="cantidades[]" type="number" class="form-control cantidad" value="{!! $articulo->pivot->cantidad !!}" min=0 placeholder="{!! $articulo->pivot->cantidad !!}"></td>
        </tr>        
    @endforeach
    </tbody>
 </table>
</div>
</div>
<div class="form-group col-sm-6">
<b>Total:   </b>
<input name="total" type="number" class="total" value="{!! $pedido->total !!}" min=0 placeholder="{!! $pedido->total !!}" readonly="readonly" size="1">
</div>
<div class="form-group col-sm-6">
<b>Total Actualizado:   </b><span class="total"></span>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.pedidos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
