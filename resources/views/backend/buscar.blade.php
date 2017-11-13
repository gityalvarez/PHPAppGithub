{!! Form::open(['url' => 'admin/backend/'.$url, 'method'=>'get', 'class'=>'form-inline']) !!}
<br/>
        
<div class="form-group {!! $errors->has('search') ? 'has-error' : '' !!}">

 	{!! Form::text('search', isset($search) ? $search : null, ['class'=>'form-control', 'placeholder' => 'Buscar ']) !!}
    {!! $errors->first('search', '<p class="help-block">:message</p>') !!}
   <br/>
</div>
{!! Form::submit('Buscar', ['class'=>'btn btn-primary']) !!}
{!! Form::close() !!} 