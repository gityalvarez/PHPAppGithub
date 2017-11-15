<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){
    $('.checkbox').on('change',function(){
        var $row = $(this).parents('tr');
        $row.find('.cantidad').toggle('.cantidad');
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
});
</script>


<h2>Total: <span class='total'></span></h2>




<table class="table table-responsive table-striped" id="articles">    
        <tr>
            <th>Stock</th>
            <th>Precio</th>
            <th>Producto</th>
            <th>Imagen</th>
            <th>Seleccionar</th>
            <th>Cantidad</th>

        </tr>    
    @foreach($articulos as $articulo)
        <tbody>
        <tr class='item'>
            <td>{!! $articulo->stock !!}</td>   
            <td> <input name='precio' class='form-control precio' value="{!! $articulo->precio !!}" readonly='readonly'></td>
            <td>{!! $articulo->producto->nombre !!}</td>
            @if (!empty($articulo->producto->imagen))
                <td><img src="{{ asset('storage/'.$articulo->producto->imagen) }}" width="100" height="80"/></td>
            @else
                <td>Articulo sin imagen...</td>
            @endif
            <td><input type="checkbox" value="" class='checkbox'></td>
            <td><input type="number" style="display:none"  name='cantidad' class='form-control cantidad' min=0 ></td>
        </tr>
        </tbody>
    @endforeach    
</table>

<div class="pull-right">
<div class="form-group col-sm-12 ">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.pedidos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
</div>
