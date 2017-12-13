@extends('layouts.frontend.app')

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
    <script type="text/javascript">
       var map = L.map('map').setView([-34.866944, -56.166667], 13);
       L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        @foreach ($comercios as $comercio)
          var marker = L.marker([{!! $comercio->latitud !!},{!! $comercio->longitud !!}]).addTo(map).bindPopup("<p>{!! $comercio->nombre !!}</p><br />{!! $comercio->direccion !!}");  
        @endforeach        
    </script>
@endsection