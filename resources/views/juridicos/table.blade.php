<table class="table table-responsive table-hover" id="juridicos-table">
    <thead>
        <th>Nit</th>
        <th>Nombre</th>
        <th>Razón Social</th>
        <th>Representante</th>    
        <th>Domicilio</th>
        <th>Estado</th>
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($juridicos as $juridico)
        <tr>
            <td>{!! $juridico->nit !!}</td>
            <td>{!! $juridico->nombre !!}</td>
            <td>{!! $juridico->razon_social !!}</td>
            <td>{!! $juridico->natural ? $juridico->natural->fullname : '<span class="badge badge-warning">No registrado </span>' !!}</td>
            <td>{!! $juridico->municipio->nombre !!}</td>     
            <td>{!! $status[$juridico->status] !!}</td>
            <td>
                {!! Form::open(['route' => ['juridicos.destroy', $juridico->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                   {{--  <a href="{!! route('juridicos.show', [$juridico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('juridicos.edit', [$juridico->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
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