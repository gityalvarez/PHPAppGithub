@extends('layouts.frontend.appmap')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Mapa de Comercios</h1>        
    </section>
    <div class="content">
        <div class="clearfix"></div>
            @include('flash::message')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                
            <div id="map" style="height: 400px"></div>

            </div>
        </div>
    </div>
@endsection