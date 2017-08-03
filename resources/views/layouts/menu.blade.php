<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{!! url('/home') !!}"><i class="fa fa-home"></i><span>Inicio</span></a>
</li>
@if (auth()->user()->isMixAdmin())
	<li class="{{ Request::is('usuarios*') ? 'active' : '' }}">
	    <a href="{!! route('usuarios.index') !!}"><i class="fa fa-user"></i><span>Usuarios</span></a>
	</li>
	<li class="{{ Request::is('roles*') ? 'active' : '' }}">
	    <a href="{!! route('roles.index') !!}"><i class="fa fa-shield"></i><span>Roles</span></a>
	</li>
@endif

<li class="{{ Request::is('triangles*') ? 'active' : '' }}">
    <a href="{!! route('triangles.index') !!}"><i class="fa fa-codepen"></i><span>Triangles Test</span></a>
</li>


