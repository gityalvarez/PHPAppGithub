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
                    {!! Form::open(['route' => 'backend.pedidos.store', 'onsubmit' => 'return verificar()']) !!}

                        @include('backend.pedidos.clients')

                        @include('backend.pedidos.articles_list')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function verificar(){
        var articulosmarcados = false;
        var articulos = document.getElementsByName("articulos[]"); 
        var i=0;        
        while (i < articulos.length && !articulosmarcados) {
            if (articulos[i].checked == true){
                articulosmarcados = true;
            }
            else {
                i++;
            }
        } 
        if (!articulosmarcados){
            alert("Debe seleccionar al menos 1 Articulo.");
            return false;
        }
        var cantidades = document.getElementsByName("cantidades[]");
        var totalcantidades = 0;
        for (var i=0; i < cantidades.length; i++){
            if (cantidades[i].value != ""){
                totalcantidades ++;
            }
        }
        var totalarticulos = 0;
        for (var j=0; j < articulos.length; j++){
            if (articulos[j].checked == true){
                totalarticulos ++;
            }
        }        
        if (totalcantidades < totalarticulos){
            alert("Falta ingresar valor en la Cantidad para algún Articulo.");
            return false;
        }
        if (totalcantidades > totalarticulos){
            alert("Se ingresaron mas valores de Cantidad que Articulos seleccionados.");
            return false;
        }
        var stocks = document.getElementsByName("stocks[]");
        var nuevostock;
        for (var x=0; x < articulos.length; x++){
            if (articulos[x].checked == true){
                nuevostock = stocks[x].value - cantidades[x].value;
                if (nuevostock < 0){
                    alert("El valor ingresado en Cantidad es mayor que el Stock del Articulo seleccionado.");
                    cantidades[x].focus();
                    return false;
                }
            }     
        }
        return true;         
    }
    </script>
</body>
@endsection



