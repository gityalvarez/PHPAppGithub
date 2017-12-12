@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido a</div>
                
                <div class="panel-body">
                    <img style="width:80%; margin:auto; display:block" src="{{ URL::asset('imagenes\PediloYA-LogoNaranja.svg')}}">
                    <!--
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <a href="login/google" class="btn btn-lg waves-effect waves-light btn-block google">Google+</a>
                        </div>
                    </div>
                -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
