<!-- Nombre Field -->
<div class="form-group col-sm-6 has-feedback{{ $errors->has('nombre') ? ' has-error' : '' }}">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Departamento Id Selector -->
<div class="form-group col-sm-6 has-feedback{{ $errors->has('departamento_id') ? ' has-error' : '' }}">
    {!! Form::label('departamento_id', 'Departamento Id') !!}
    {!! Form::select('departamento_id', ['departamento_id'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('municipios.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>