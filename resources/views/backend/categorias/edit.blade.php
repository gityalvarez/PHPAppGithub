@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Categoria
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($categoria, ['route' => ['backend.categorias.update', $categoria->id], 'method' => 'patch']) !!}

                        @include('backend.categorias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection