@extends('layouts.frontend.app')

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
                    @include('frontend.pedidos.show_fields')
                    <a href="{!! route('frontend.pedidos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
