@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Persona
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($persona, ['route' => ['backend.personas.update', $persona->id], 'method' => 'patch']) !!}

                        @include('backend.personas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection