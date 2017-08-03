<table class="table table-responsive table-hover" id="municipios-table">
    <thead>
        <th>Nombre</th>
        <th>Departamento</th>
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($municipios as $municipio)
        <tr>
            <td>{!! $municipio->nombre !!}</td>
            <td>{!! $municipio->departamento->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['municipios.destroy', $municipio->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                   {{--  <a href="{!! route('municipios.show', [$municipio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('municipios.edit', [$municipio->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
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