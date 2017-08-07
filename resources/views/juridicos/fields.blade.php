<!-- Nit Field -->
<div class="form-group col-sm-4 col-lg-4 {{ $errors->has('nit') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('nit', 'Nit') !!}
    {!! Form::text('nit', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-8 col-lg-8 {{ $errors->has('nombre') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Razon Social Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('razon_social') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('razon_social', 'Razón Social') !!}
    {!! Form::text('razon_social', null, ['class' => 'form-control']) !!}
</div>

<!-- Natural Id Selector -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('natural_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('natural_id', 'Representante legal') !!}
    {!! Form::select('natural_id', $sels['natural_id'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Actividad Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('actividad') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('actividad', 'Actividad') !!}
    {!! Form::text('actividad', null, ['class' => 'form-control']) !!}
</div>

<!-- direccion Field -->
<div class="form-group col-sm-6 col-lg-8 {{ $errors->has('direccion') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('direccion', 'Dirección') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Municipio Id Selector -->
<div class="form-group col-sm-6 col-lg-4 {{ $errors->has('municipio_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('municipio_id', 'Ciudad') !!}
    {!! Form::select('municipio_id', $sels['municipio_id'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('email') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('email', 'Email') !!}
    <i class="fa fa-envelope-o ci-addon-icon ci-left"></i>
    {!! Form::email('email', null, ['class' => 'form-control ci-addon-input']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('celular') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('celular', 'Celular') !!}
    <i class="fa fa-phone ci-addon-icon ci-left"></i>
    {!! Form::text('celular', null, ['class' => 'form-control ci-addon-input']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('telefono') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('telefono', 'Teléfono') !!}
     <i class="fa fa-phone ci-addon-icon ci-left"></i>
    {!! Form::text('telefono', null, ['class' => 'form-control ci-addon-input']) !!}
</div>

<!-- Status Selector -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('status') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('status', 'Status') !!}
    {!! Form::select('status', $sels['juridicoStatus'], 'A', ['class' => 'form-control select2_short', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('observaciones') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('observaciones', 'Observaciones') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('juridicos.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>