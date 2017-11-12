@extends('layouts.frontend.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Búsqueda de Pedidos
            <p></p>
        </h1>        
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['route' => 'frontend.pedidos.search', 'method' => 'post', 'class' => 'navbar-form navbar-left', 'role' => 'search']) !!}
                    <div class="form-group">
                        {!! Form::text('numero', null, ['required' => 'required', 'class' => 'form-control', 'placeholder' => 'Número de Pedido']) !!}                        
                    </div>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

