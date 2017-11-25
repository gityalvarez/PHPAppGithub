@extends('layouts.app')

@section('content')
<body>
    <section class="content-header">
        <h1>
            Pedido
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pedido, ['route' => ['backend.pedidos.update', $pedido->id], 'method' => 'patch', 'onsubmit' => 'return verificar()']) !!}

                        @include('backend.pedidos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
    <script type="text/javascript">
    function verificar(){
        var articulos = document.getElementsByName("articulos[]"); 
        var cantidades = document.getElementsByName("cantidades[]");
        var totalcantidades = 0;
        for (var i=0; i < cantidades.length; i++){
            if (cantidades[i].value != ""){
                totalcantidades ++;
            }
        }        
        var totalarticulos = articulos.length;            
        if (totalcantidades < totalarticulos){
            alert("Falta ingresar valor en la Cantidad para algún Articulo.");
            return false;
        }
        var stocks = document.getElementsByName("stocks[]");
        var nuevostock;
        for (var x=0; x < articulos.length; x++){
            nuevostock = stocks[x].value - cantidades[x].value;
            if (nuevostock < 0){
                alert("El valor ingresado en Cantidad es mayor que el Stock del Articulo seleccionado.");
                cantidades[x].focus();
                return false;
            }                 
        }
        return true;         
    }
    </script>
</body>
@endsection