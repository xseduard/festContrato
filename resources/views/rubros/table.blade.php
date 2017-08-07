<table class="table table-responsive table-hover" id="rubros-table">
    <thead>
        <th>Nombre</th>
        <th>Codigo</th>
        <th>Valor</th>
        <th>Vigencia Fiscal</th>
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($rubros as $rubro)
        <tr>
            <td>{!! $rubro->nombre !!}</td>
            <td>{!! $rubro->codigo !!}</td>
            <td>{!! $rubro->valor !!}</td>
            <td>{!! $rubro->fecha_vigencia_inicio->year,' - ',$rubro->fecha_vigencia_final->year !!}</td>
            <td>
                {!! Form::open(['route' => ['rubros.destroy', $rubro->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                   {{--  <a href="{!! route('rubros.show', [$rubro->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('rubros.edit', [$rubro->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
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