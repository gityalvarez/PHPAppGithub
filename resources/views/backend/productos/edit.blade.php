@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Producto
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($producto, ['route' => ['backend.productos.update', $producto->id], 'method' => 'patch']) !!}

                        @include('backend.productos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection