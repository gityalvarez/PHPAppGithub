<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Calle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Calle', 'Calle:') !!}
    {!! Form::text('calle', null, ['class' => 'form-control']) !!}
</div>

    <!-- Nopuerta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nopuerta', 'N° Puerta:') !!}
    {!! Form::text('nopuerta', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo', 'Logo:') !!}
    {!!Form::file('logo_comercio',['class'=>'form-control'])!!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Gerente:') !!}<p></p>    
    {!! Form::select('user_id', $gerentes, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('backend.comercios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
