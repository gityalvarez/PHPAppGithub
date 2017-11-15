@extends('layouts.app')

@section('content')
    <section class="content-header">
        @if ($user -> hasRole('gerente'))
        <h1 class="pull-left">Pedidos del Gerente</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('backend.pedidos.create') !!}">Nuevo Pedido</a>
        </h1>
        @endif
        @if ($user -> hasRole('despachador'))
        <h1 class="pull-left">Pedidos a Despachar</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('backend.pedidos.dispatch') !!}">Despachar Pedidos</a>
        </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('backend.pedidos.table')
            </div>
        </div>
    </div>
@endsection

