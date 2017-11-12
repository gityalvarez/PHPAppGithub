@extends('layouts.frontend.app')

@section('content')
    <section class="content-header">
        <h1>
            Articulo
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('frontend.articulos.show_fields')
                    <a href="{!! route('frontend.articulos.index') !!}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
