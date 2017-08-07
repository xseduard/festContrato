<!-- Codigo Field -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('codigo') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('codigo', 'Número del Contrato') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Expedicion campo de fecha -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('fecha_expedicion') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('fecha_expedicion', 'Fecha expedición del contrato') !!}
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
    	{!! Form::text('fecha_expedicion', null, ['class' => 'form-control datepicker', 'placeholder' => 'AAAA-MM-DD']) !!}
    </div>
</div>
<!-- Tipo Selector -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('tipo') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('tipo', 'Tipo de contrato') !!}
    {!! Form::select('tipo', $sels['tipo_contrato'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Faccion Id Selector -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('faccion_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('faccion_id', 'Facción / Dependencia / Secretaría') !!}
    {!! Form::select('faccion_id', $sels['faccion_id'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>
<div class="clearfix"></div>
<!-- Contratable Type Selector -->
<div class="form-group col-sm-6 col-lg-2 {{ $errors->has('contratable_type') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('contratable_type', 'Tipo de contratista') !!}
    {!! Form::select('contratable_type', $sels['tercero_type'], null, ['class' => 'form-control select2_short', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Contratable Id Field -->
<div class="form-group col-sm-6 col-lg-5 {{ $errors->has('contratable_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('contratable_id', 'Contratista') !!}
    {!! Form::select('contratable_id', [], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>
<!-- Supervisor Aux Id Selector -->
<div class="form-group col-sm-6 col-lg-5 {{ $errors->has('supervisor_aux_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('supervisor_aux_id', 'Supervisor Auxiliar') !!}
    {!! Form::select('supervisor_aux_id', $sels['natural_bycargo'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Fecha Vigencia Inicio campo de fecha -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('fecha_vigencia_inicio') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('fecha_vigencia_inicio', 'Fecha acta de inicio') !!}
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
        {!! Form::text('fecha_vigencia_inicio', null, ['class' => 'form-control datepicker', 'placeholder' => 'AAAA-MM-DD']) !!}
    </div>
</div>
<!-- Fecha Vigencia Final campo de fecha -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('fecha_vigencia_final') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('fecha_vigencia_final', 'Vigencia del contrato') !!}
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
        {!! Form::text('fecha_vigencia_final', null, ['class' => 'form-control datepicker', 'placeholder' => 'AAAA-MM-DD']) !!}
    </div>
</div>
<!-- Compromiso Presupuestal Field -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('compromiso_presupuestal') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('compromiso_presupuestal', 'No. Compromiso Presupuestal') !!}
    {!! Form::text('compromiso_presupuestal', null, ['class' => 'form-control']) !!}
</div>

<!-- Compromiso Presupuestal Fecha campo de fecha -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('compromiso_presupuestal_fecha') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('compromiso_presupuestal_fecha', 'Fecha Compromiso Presupuestal') !!}
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
        {!! Form::text('compromiso_presupuestal_fecha', null, ['class' => 'form-control datepicker', 'placeholder' => 'AAAA-MM-DD']) !!}
    </div>
</div>
<!-- Rubro Id Selector -->
<div class="form-group col-sm-6 col-lg-6 {{ $errors->has('rubro_id') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('rubro_id', 'Rubro') !!}
    {!! Form::select('rubro_id', $sels['rubro_id'], null, ['class' => 'form-control select2', 'style' => 'width: 100%', 'placeholder'=>'Seleccione...*']) !!}
</div>

<!-- Valor Contrato Field -->
<div class="form-group col-sm-6 col-lg-3 {{ $errors->has('valor_contrato') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('valor_contrato', 'Valor Contrato') !!}
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
        {!! Form::text('valor_contrato', null, ['class' => 'form-control text-right']) !!}
    </div>
</div>


<!-- Objeto Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('objeto') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('objeto', 'Objeto') !!}
    {!! Form::textarea('objeto', null, ['class' => 'form-control', 'rows' => '2']) !!}
</div>
<!-- Observaciones Field -->
<div class="form-group col-sm-12 col-lg-12 {{ $errors->has('observaciones') ? ' has-feedback has-error' : '' }}">
    {!! Form::label('observaciones', 'Observaciones') !!}
    {!! Form::textarea('observaciones', null, ['class' => 'form-control',  'rows' => '4']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('contratos.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>

@push('scripts')
    <script>
            $("#contratable_type").change(event => {                
                if ( event.target.value == 'App\\Models\\Natural' ) {
                    $.post(`/naturals/bycargo`,
                    {
                        _token: "{{ csrf_token()}}",
                        cargos: "CONTRAT"
                    },
                    function(res, sta){
                        $("#contratable_id").empty();
                        res.forEach(element => {
                            $("#contratable_id").append(`<option value=${element.id}> ${element.cedula} - ${element.nombres}  ${element.apellidos} </option>`);
                        });
                    });
                    
                } else {
                      $.get(`/juridicos`, function(res, sta){
                        $("#contratable_id").empty();
                        res.forEach(element => {
                            $("#contratable_id").append(`<option value=${element.id}> ${element.nit} - ${element.nombre} </option>`);
                        });
                    });                             
                }
                
            });
    </script>
@endpush