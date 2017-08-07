<!-- Key Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('key') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('key', 'Key') !!}
    {!! Form::text('key', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('nombre') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('observaciones') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('observaciones', 'Observaciones') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('cargos.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>