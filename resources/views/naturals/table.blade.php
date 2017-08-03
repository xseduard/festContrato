<table class="table table-responsive table-hover" id="naturals-table">
    <thead>
        <th>Cédula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Genero</th>
        <th>Correo</th>
        <th>Estado</th>
        <th>Usuario RelGen</th>
        <th>Última actualización</th>
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($naturals as $natural)
        <tr>
            <td>{!! number_format($natural->cedula, 0, '.', '.' ) !!}</td>
            <td>{!! $natural->nombres !!}</td>
            <td>{!! $natural->apellidos !!}</td>
            <td>{!! $natural->genero !!}</td>
            <td>{!! $natural->correo !!}</td>
            <td>{!! $natural->status !!}</td>
            <td>{!! $natural->user_gen_id !!}</td>
            <td>{!! $natural->updated_at->diffForHumans() !!}</td>
            <td>
                {!! Form::open(['route' => ['naturals.destroy', $natural->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                   {{--  <a href="{!! route('naturals.show', [$natural->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('naturals.edit', [$natural->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
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