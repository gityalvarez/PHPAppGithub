@extends('layouts.app')

@section('heading', 'Edit User')

@section('content')

<h1>Editar Usuario</h1>


<form  action="{{ route('entrust-gui::users.update', $user->id) }}" method="post" role="form">
    <input  type="hidden" name="_method" value="put">
    @include('entrust-gui::users.partials.form')
    <button type="submit" id="save" class="btn btn-labeled btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>{{ trans('entrust-gui::button.save') }}</button>
    <a class="btn btn-labeled btn-default" href="{{ route('entrust-gui::users.index') }}"><span class="btn-label"><i class="fa fa-chevron-left"></i></span>{{ trans('entrust-gui::button.cancel') }}</a>
</form>


@endsection

