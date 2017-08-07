<table class="table table-responsive table-hover" id="faccions-table">
    <thead>
        <th>Llave interna</th>
        <th>Nombre</th>
        <th>Observaciones</th>
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($faccions as $faccion)
        <tr>
            <td>{!! $faccion->key !!}</td>
            <td>{!! $faccion->nombre !!}</td>
            <td>{!! $faccion->observaciones !!}</td>
            <td>
                {!! Form::open(['route' => ['faccions.destroy', $faccion->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                   {{--  <a href="{!! route('faccions.show', [$faccion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('faccions.edit', [$faccion->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
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