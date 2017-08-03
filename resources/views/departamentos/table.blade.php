<table class="table table-responsive table-hover" id="departamentos-table">
    <thead>
        <th>Nombre</th>
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($departamentos as $departamento)
        <tr>
            <td>{!! $departamento->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['departamentos.destroy', $departamento->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                   {{--  <a href="{!! route('departamentos.show', [$departamento->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('departamentos.edit', [$departamento->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
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