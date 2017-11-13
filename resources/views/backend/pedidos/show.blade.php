@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pedido
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('backend.pedidos.show_fields')
                    <a href="{!! route('backend.pedidos.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
