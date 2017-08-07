<table class="table table-responsive table-hover" id="cargos-table">
    <thead>
        <th>llave interna</th>
        <th>Nombre</th>
        <th>Observaciones</th>
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($cargos as $cargo)
        <tr>
            <td>{!! $cargo->key !!}</td>
            <td>{!! $cargo->nombre !!}</td>
            <td>{!! $cargo->observaciones !!}</td>
            <td>
                {!! Form::open(['route' => ['cargos.destroy', $cargo->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                   {{--  <a href="{!! route('cargos.show', [$cargo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('cargos.edit', [$cargo->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
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