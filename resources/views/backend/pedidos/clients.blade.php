<div class="form-group col-sm-6">
    {!! Form::label('cliente_id', 'Cliente: ') !!}</p>
    {!! Form::select('cliente_id', $clientes->pluck('name','id'), ['class' => 'form-control']) !!}
</div>


