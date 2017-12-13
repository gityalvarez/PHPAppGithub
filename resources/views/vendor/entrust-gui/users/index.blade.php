@extends('layouts.app')
@section('heading', 'Users')

@section('content')

<section class="content-header">
        <h1 class="pull-left">Usuarios</h1>
        <!--Estos br son para darle el espacio del search-->
        <br/>
        @include('backend.buscar',['url'=>'users?search'])
      
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('entrust-gui::users.create') }}">Nuevo Usuario</a>
        </h1>
</section>
<div class="content">

  <div class="clearfix"></div>

  @include('flash::message')

  <div class="clearfix"></div>
  <div class="box box-primary">
      <div class="box-body">

        <table class="table table-striped">
          <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Acciones</th>
          </tr>
          @foreach($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->direccion }}</td>
              <td class="col-xs-3">
                <form action="{{ route('entrust-gui::users.destroy', $user->id) }}" method="post">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class='btn-group'>
                    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::users.edit', $user->id) }}">
                      <span class="btn-label">
                        <i class="fa fa-pencil">
                        </i>
                      </span> {{ trans('entrust-gui::button.edit') }}</a>
                    <button type="submit" class="btn btn-labeled btn-danger" onclick='confirm("Realmente está seguro?")'><span class="btn-label"><i class="fa fa-trash"></i></span> {{ trans('entrust-gui::button.delete') }}</button>
                  </div>
                </form>



              </td>
            </tr>
          @endforeach
        </table>

 </div>
        </div>
    </div>
<div class="text-center">
  {!! $users->render() !!}
</div>
@endsection
