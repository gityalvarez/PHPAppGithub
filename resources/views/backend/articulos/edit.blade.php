@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Articulo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($articulo, ['route' => ['backend.articulos.update', $articulo->id], 'method' => 'patch']) !!}

                        @include('backend.articulos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection