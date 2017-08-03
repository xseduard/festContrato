<!-- Cedula Field -->
<div class="form-group col-sm-4">
    {!! Form::label('cedula', 'Cedula:') !!}
    {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-4">
    {!! Form::label('nombres', 'Nombres') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-4">
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="clearfix"></div>

@if (auth()->user()->isAdmin())
    <!-- Roles Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('roles', 'Roles') !!}
            @foreach ($roles as $id => $name)
                <label class="checkbox-inline">
                    {!! Form::checkbox('roles[]', $id, $user->roles->pluck('id')->contains($id) ? '1' : null) !!} {{ $name }}                   
                </label>
            @endforeach
    </div>
@endif

@if (Request::is('usuarios/create'))
    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password_confirmation', 'Confirmar Contraseña') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::button('<i class="glyphicon glyphicon-floppy-disk"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary btn-flat']) !!}
    <a href="{!! route('usuarios.index') !!}" class="btn btn-default btn-flat">Cancelar</a>
</div>