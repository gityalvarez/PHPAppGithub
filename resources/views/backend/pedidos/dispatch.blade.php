@extends('layouts.app')

@section('content')
<body>
    <section class="content-header">
        <h1 class="pull-left">Despachar Pedidos</h1>
        <br>
        <br>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        
        @include('flash::message')
        
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['route' => 'backend.pedidos.send', 'onsubmit' => 'return verificar()']) !!}  
                
                @include('backend.pedidos.orders_list')
                
                {!! Form::close() !!}                
            </div>                          
        </div>        
    </div>
    <script type="text/javascript">
    function verificar(){
        var pedidosmarcados = false;
        var pedidos = document.getElementsByName('pedidos[]'); 
        var i=0;
        while (i<pedidos.length && !pedidosmarcados) {
            if (pedidos[i].checked == true){
                pedidosmarcados = true;
            }
            else {
                i++;
            }
        } 
        if (!pedidosmarcados){
            alert("Debe seleccionar al menos 1 Pedido.");
            return false;
        }
    else {
        return true;
    } 
}
</script>
</body>
@endsection


