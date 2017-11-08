@extends('layouts.frontend.app')
@section('content')


    <section class="content-header">
        <h1 class="pull-left">mapeooooo</h1>        
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