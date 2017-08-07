<!-- Item Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('item') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('item', 'Obligación especifica') !!}
    {!! Form::textarea('item', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('status') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('status', 'Estado') !!}
    {!! Form::text('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('obligacions.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>