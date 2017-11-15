@extends('layouts.app')

@section('content')
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
                {!! Form::open(['route' => 'backend.pedidos.send']) !!}  
                
                @include('backend.pedidos.orders_list')
                
                {!! Form::close() !!}                
            </div>                          
        </div>        
    </div>
@endsection


