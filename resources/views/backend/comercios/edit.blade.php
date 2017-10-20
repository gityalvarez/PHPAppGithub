@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Comercio
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($comercio, ['route' => ['backend.comercios.update', $comercio->id], 'method' => 'patch']) !!}

                        @include('backend.comercios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection