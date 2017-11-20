<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <!--p-->{!! $pedido->id !!}<!--/p-->
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <!--p-->{!! $pedido->estado !!}<!--/p-->
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('name', 'Cliente:') !!}    
    <!--p-->{!! $user->name; !!}<!--/p-->
</div>

<div class="form-group">
    {!! Form::label('articulos', 'Articulos:') !!}
<div style="margin:0px; padding:6px; width:100%; margin-bottom: 10px; height:290px; overflow:auto">
<table class="table table-responsive table-striped" id="articles">
        <tr>
            <th>Producto</th>
            <th>Imagen</th>
            <th>Precio</th>            
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
     <tbody>        
    @foreach($articulos as $articulo)           
        <tr class="item">
            <td>{!! $articulo->producto->nombre !!}</td>
            @if (!empty($articulo->producto->imagen))
                <td><img src="{{ asset('storage/'.$articulo->producto->imagen) }}" width="100" height="80"/></td>
            @else
                <td>Articulo sin imagen...</td>
            @endif
            <td>{!! $articulo->precio !!}</td>
            <td>{!! $articulo->pivot->cantidad !!}</td>
            <td>{!! $articulo->precio * $articulo->pivot->cantidad !!}</td>
        </tr>        
    @endforeach
    </tbody>
 </table>
</div>
</div>

<!-- Total Field -->
<div class="form-group">
    {!! Form::label('total', 'Total:') !!}
    <!--p-->{!! $pedido->total !!}<!--/p-->
</div>

<!-- Created At Field -->
<!--div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $pedido->created_at !!}</p>
</div-->

<!-- Updated At Field -->
<!--div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $pedido->updated_at !!}</p>
</div-->

<!-- Deleted At Field -->
<!--div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $pedido->deleted_at !!}</p>
</div-->

