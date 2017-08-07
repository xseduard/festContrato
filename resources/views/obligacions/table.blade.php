<table class="table table-responsive table-hover" id="obligacions-table">
    <thead>
        <th>Obligación especifica</th>
        <th>Progreso</th>
        <th>Estado</th>
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($obligacions as $obligacion)
        <tr>
            <td>{!! $obligacion->item !!}</td>
            <td><span class="label label-default">{!! $obligacion->progress !!}%</span></td>
            <td> {!! empty($obligacion->status) ? '<span class="badge badge-default">N/D </span>' : $obligacion->status !!}</td>
            <td>
                {!! Form::open(['route' => ['obligacions.destroy', $obligacion->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                   {{--  <a href="{!! route('obligacions.show', [$obligacion->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('obligacions.edit', [$obligacion->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
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