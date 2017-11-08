@extends('layouts.frontend.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Comercios
            <p></p>
            @include('frontend.buscar',['url'=>'comercios?search'])
            <p></p>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('frontend.comercios.table')
            </div>
        </div>
    </div>
@endsection

