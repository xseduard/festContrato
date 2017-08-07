<!-- cedula Field -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('cedula') ? 'has-feedback has-error' : '' }}">
    {!! Form::label('cedula', 'Cédula') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>
<!-- Expedicion Mpio Id Selector -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('expedicion_mpio_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('expedicion_mpio_id', 'Lugar de expedición') !!}
    {!! Form::select('expedicion_mpio_id', $sels['municipio_id'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6 col-lg-5 {{ $errors->has('nombres') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('nombres', 'Nombres') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6 col-lg-5 {{ $errors->has('apellidos') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!-- Genero Selector -->
<div class="form-group col-sm-6 col-lg-2 {{ $errors->has('genero') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('genero', 'Genero') !!}
    {!! Form::select('genero', $sels['generos'], 'M', ['class' => 'form-control select2_short', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6 col-lg-8 {{ $errors->has('direccion') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('direccion', 'Dirección') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Mpio Id Selector -->
<div class="form-group col-sm-6 col-lg-4 {{ $errors->has('direccion_mpio_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('direccion_mpio_id', 'Ciudad / Domicilio') !!}
    {!! Form::select('direccion_mpio_id', $sels['municipio_id'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- email Field -->
<div class="form-group col-sm-6 col-lg-4{{ $errors->has('email') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('email', 'Email') !!}
    <i class="fa fa-envelope-o ci-addon-icon ci-left"></i>
    {!! Form::email('email', null, ['class' => 'form-control ci-addon-input']) !!}
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6 col-lg-4 {{ $errors->has('celular') ? 'has-feedback has-error' : '' }}">
    {!! Form::label('celular', 'Celular') !!}
    <i class="fa fa-mobile ci-addon-icon ci-left"></i>
    {!! Form::text('celular', null, ['class' => 'form-control ci-addon-input']) !!}
</div>

<!-- Telefono Field -->
<div class="form-group col-sm-6 col-lg-4 {{ $errors->has('telefono') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('telefono', 'Teléfono') !!}
     <i class="fa fa-phone ci-addon-icon ci-left"></i>
    {!! Form::text('telefono', null, ['class' => 'form-control ci-addon-input']) !!}
</div>

<!-- faccion_id Selector -->
<div class="form-group col-sm-6 col-lg-4 {{ $errors->has('faccion_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('faccion_id', 'Facción') !!}
    {!! Form::select('faccion_id', $sels['faccion_id'], null, ['class' => 'form-control select2_short', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- cargo_id Selector -->
<div class="form-group col-sm-6 col-lg-4 {{ $errors->has('cargo_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('cargo_id', 'Cargo / Relación / Intervención') !!}
    {!! Form::select('cargo_id', $sels['cargo_id'], null, ['class' => 'form-control select2_short', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Status Selector -->
<div class="form-group col-sm-6 col-lg-4 {{ $errors->has('status') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('status', 'Estado') !!}
    {!! Form::select('status', $sels['naturalStatus'], 'A', ['class' => 'form-control select2_short', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('observaciones') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('observaciones', 'Observaciones') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('naturals.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>