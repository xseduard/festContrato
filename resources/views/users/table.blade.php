<table class="table table-responsive table-hover" id="users-table">
    <thead>
        <th>Cédula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Email</th>
        <th>Roles</th>
        <th>Última Actualización</th>
        <th colspan="3" class="text-right">Acciones</th>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! number_format($user->cedula, 0, '.', '.' ) !!}</td>
            <td>{!! $user->nombres !!}</td>
            <td>{!! $user->apellidos !!}</td>
            <td>{!! $user->email !!}</td>
            <td>{{  $user->roles->pluck('display_name')->implode(', ') }}</td>
            <td>{{ $user->created_at->diffForHumans() }}</td>
            <td>
                {!! Form::open(['route' => ['usuarios.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                   {{--  <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> --}}
                    <a href="{!! route('usuarios.edit', [$user->id]) !!}" class='btn btn-default btn-xs' title='Editar'><i class="glyphicon glyphicon-edit"></i></a>
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