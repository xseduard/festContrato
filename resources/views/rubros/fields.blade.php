<!-- Nombre Field -->
<div class="form-group col-sm-6 col-lg-4 has-feedback{{ $errors->has('nombre') ? ' has-error' : '' }}">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Codigo Field -->
<div class="form-group col-sm-6 col-lg-4 has-feedback{{ $errors->has('codigo') ? ' has-error' : '' }}">
    {!! Form::label('codigo', 'Codigo') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Field -->
<div class="form-group col-sm-6 col-lg-4 has-feedback{{ $errors->has('valor') ? ' has-error' : '' }}">
    {!! Form::label('valor', 'Valor') !!}
    {!! Form::text('valor', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Vigencia Inicio campo de fecha -->
<div class="form-group col-sm-6 col-lg-4 has-feedback{{ $errors->has('fecha_vigencia_inicio') ? ' has-error' : '' }}">
    {!! Form::label('fecha_vigencia_inicio', 'Fecha Inicio de Vigencia') !!}
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
    	{!! Form::text('fecha_vigencia_inicio', null, ['class' => 'form-control datepicker', 'title' => 'Vigencia Fiscal (2017-01-01)', 'placeholder' => 'AAAA-MM-DD']) !!}
    </div>
</div>

<!-- Fecha Vigencia Final campo de fecha -->
<div class="form-group col-sm-6 col-lg-4 has-feedback{{ $errors->has('fecha_vigencia_final') ? ' has-error' : '' }}">
    {!! Form::label('fecha_vigencia_final', 'Fecha Final Vigencia') !!}
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
    	{!! Form::text('fecha_vigencia_final', null, ['class' => 'form-control datepicker', 'title' => 'Vigencia Fiscal (2017-12-31)', 'placeholder' => 'AAAA-MM-DD']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('rubros.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>