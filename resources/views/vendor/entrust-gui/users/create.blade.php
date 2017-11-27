@extends('layouts.app')
@section('heading', 'Create User')

@section('content')



<section class="content-header">
        <h1 class="pull-left">Nuevo Usuario</h1>
        <!--Estos br son para darle el espacio del search-->
        <br/>
        <br/>
</section>

<div class="content">

  <div class="clearfix"></div>

    <div class="clearfix"></div>
  	  <div class="box box-primary">
  	      <div class="box-body">
  			<form action="{{ route('entrust-gui::users.store') }}" method="post" role="form">
  			    @include('entrust-gui::users.partials.form')
  			    <button type="submit" id="create" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-plus"></i></span>  {{ trans('entrust-gui::button.create') }}</button>
  			    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::users.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>{{ trans('entrust-gui::button.cancel') }}</a>
  			</form>


		</div>
  </div>
</div>

@endsection
