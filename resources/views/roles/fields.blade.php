<!-- Name Field -->
<div class="form-group col-sm-6 has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'llave interna') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}    
</div>

<!-- Display Name Field -->
<div class="form-group col-sm-6 has-feedback{{ $errors->has('display_name') ? ' has-error' : '' }}">
    {!! Form::label('display_name', 'Nombre Público') !!}
    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 has-feedback{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>