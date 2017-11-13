@extends('layouts.app')
@section('heading', 'Roles')

@section('content')

<section class="content-header">
        <h1 class="pull-left">Roles</h1>
                <!--Estos br son para darle el espacio del search-->
        <br/>
        <br/>
        <br/>
        <br/>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('entrust-gui::roles.create') }}">Nuevo Rol</a>
        </h1>
    </section>
<div class="content">

  <div class="clearfix"></div>

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-body">


            <table class="table table-striped">
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                @foreach($models as $model)
                    <tr>
                        <td>{{ $model->name }}</th>

                        <td class="col-xs-3">
                            <form action="{{ route('entrust-gui::roles.destroy', $model->id) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::roles.edit', $model->id) }}"><span class="btn-label"><i class="fa fa-pencil"></i></span>{{ trans('entrust-gui::button.edit') }}</a>
                                <button type="submit" class="btn btn-labeled btn-danger"><span class="btn-label"><i class="fa fa-trash"></i></span>{{ trans('entrust-gui::button.delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div class="text-center">
    {!! $models->render() !!}
</div>
@endsection
