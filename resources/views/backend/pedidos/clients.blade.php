<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente: ') !!}
    {!! Form::select('cliente_id', ['0' => 'Elija cliente'] + $clientes, ['class' => 'form-control']) !!}
</div>


