<!-- cedula Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('cedula') ? 'has-feedback has-error' : '' }}">
    {!! Form::label('cedula', 'Cédula') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>
<!-- Expedicion Mpio Id Selector -->
<div class="form-group col-sm-6 col-lg-6 has-feedback{{ $errors->has('expedicion_mpio_id') ? ' has-error' : '' }}">
    {!! Form::label('expedicion_mpio_id', 'Lugar de expedición') !!}
    {!! Form::select('expedicion_mpio_id', $sels['municipio_id'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6 col-lg-5 has-feedback{{ $errors->has('nombres') ? ' has-error' : '' }}">
    {!! Form::label('nombres', 'Nombres') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6 col-lg-5 has-feedback{{ $errors->has('apellidos') ? ' has-error' : '' }}">
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!-- Genero Selector -->
<div class="form-group col-sm-6 col-lg-2 has-feedback{{ $errors->has('genero') ? ' has-error' : '' }}">
    {!! Form::label('genero', 'Genero') !!}
    {!! Form::select('genero', $sels['generos'], 'M', ['class' => 'form-control select2_short', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6 col-lg-8 has-feedback{{ $errors->has('direccion') ? ' has-error' : '' }}">
    {!! Form::label('direccion', 'Dirección') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Mpio Id Selector -->
<div class="form-group col-sm-6 col-lg-4 has-feedback{{ $errors->has('direccion_mpio_id') ? ' has-error' : '' }}">
    {!! Form::label('direccion_mpio_id', 'Ciudad / Domicilio') !!}
    {!! Form::select('direccion_mpio_id', $sels['municipio_id'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Correo Field -->
<div class="form-group col-sm-6 col-lg-3 has-feedback{{ $errors->has('correo') ? ' has-error' : '' }}">
    {!! Form::label('correo', 'Correo') !!}
    <i class="fa fa-envelope-o ci-addon-icon ci-left"></i>
    {!! Form::email('correo', null, ['class' => 'form-control ci-addon-input']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('celular') ? 'has-feedback has-error' : '' }}">
    {!! Form::label('celular', 'Celular') !!}
    <i class="fa fa-mobile ci-addon-icon ci-left"></i>
    {!! Form::text('celular', null, ['class' => 'form-control ci-addon-input']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6 col-lg-3 has-feedback{{ $errors->has('telefono') ? ' has-error' : '' }}">
    {!! Form::label('telefono', 'Teléfono') !!}
     <i class="fa fa-phone ci-addon-icon ci-left"></i>
    {!! Form::text('telefono', null, ['class' => 'form-control ci-addon-input']) !!}
</div>

<!-- Status Selector -->
<div class="form-group col-sm-6 col-lg-3 has-feedback{{ $errors->has('status') ? ' has-error' : '' }}">
    {!! Form::label('status', 'Estado') !!}
    {!! Form::select('status', $sels['naturalStatus'], 'A', ['class' => 'form-control select2_short', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-12 col-lg-12 has-feedback{{ $errors->has('observaciones') ? ' has-error' : '' }}">
    {!! Form::label('observaciones', 'Observaciones') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('naturals.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>