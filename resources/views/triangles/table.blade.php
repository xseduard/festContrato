<table class="table table-responsive" id="triangles-table">
    <thead>
        <th>Text</th>
        <th>Numero</th>
        <th>Parrafo</th>
        <th colspan="3" class="text-right">Action</th>
    </thead>
    <tbody>
    @foreach($triangles as $triangle)
        <tr>
            <td>{!! $triangle->text !!}</td>
            <td>{!! $triangle->numero !!}</td>
            <td>{!! $triangle->parrafo !!}</td>
            <td>
                {!! Form::open(['route' => ['triangles.destroy', $triangle->id], 'method' => 'delete']) !!}
                <div class='btn-group pull-right'>
                    <a href="{!! route('triangles.show', [$triangle->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('triangles.edit', [$triangle->id]) !!}" class='btn btn-default btn-xs btn-fl'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>