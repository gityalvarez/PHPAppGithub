@extends('layouts.frontend.app')
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Articulos
            <p></p>
            @include('frontend.articulos.search',['url'=>'articulos?search'])
            <p></p>
        </h1>        
    </section>
    <div class="content">
        <div class="clearfix"></div>        

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('frontend.articulos.table')
                     <a href="http://localhost:8000/login/google" class="btn btn-block btn-social btn-google"><i class="fa fa-google-plus"></i></a>

            </div>
        </div>
    </div>
@endsection

