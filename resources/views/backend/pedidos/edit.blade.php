@extends('layouts.app')

@section('content')
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
                   {!! Form::model($pedido, ['route' => ['backend.pedidos.update', $pedido->id], 'method' => 'patch']) !!}

                        @include('backend.pedidos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection