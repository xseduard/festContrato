<table class="table table-responsive table-hover" id="contratos-table">
    <thead>
        <th>No.</th>
        <th>Fecha Expedición</th>
        <th>Contratatista</th>
        <th>Facción</th>
        {{-- <th>Supervisor Aux</th> --}}
        <th>Acta de Inicio</th>
        <th>Vigencia Final</th>
        <th>Valor Contrato</th>        
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($contratos as $contrato)
        <tr>
            <td>{!! $contrato->codigo !!}</td>
            <td>{!! $contrato->fecha_expedicion->format('d-F-Y') !!}</td>
            <td>{!! $contrato->contratable->fullname !!}</td>
            <td>{!! $contrato->faccion->nombre !!}</td>
            {{-- <td>{!! $contrato->supervisor_aux_id !!}</td> --}}
            <td>{!! $contrato->fecha_vigencia_inicio->format('d-m-Y') !!}</td>
            <td>{!! $contrato->fecha_vigencia_final->format('d-m-Y') !!}</td>
            <td>{!! "$".number_format($contrato->valor_contrato, 2, '.', ',' ) !!}</td>            
            <td>
                {!! Form::open(['route' => ['contratos.destroy', $contrato->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    <a href="{!! route('contratos.show', [$contrato->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('contratos.edit', [$contrato->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'onclick' => "return confirm('¿Confirma que desea eliminar?')",
                        'title' => 'Eliminar'
                        ]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>