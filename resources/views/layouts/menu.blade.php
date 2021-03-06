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


<li class="{{ Request::is('rubros*') ? 'active' : '' }}">
    <a href="{!! route('rubros.index') !!}"><i class="fa fa-circle-thin"></i></i><span>Rubros</span></a>
</li>

<li class="{{ Request::is('departamentos*') ? 'active' : '' }}">
    <a href="{!! route('departamentos.index') !!}"><i class="fa fa-circle-thin"></i></i><span>Departamentos</span></a>
</li>

<li class="{{ Request::is('municipios*') ? 'active' : '' }}">
    <a href="{!! route('municipios.index') !!}"><i class="fa fa-circle-thin"></i></i><span>Municipios</span></a>
</li>

<li class="{{ Request::is('naturals*') ? 'active' : '' }}">
    <a href="{!! route('naturals.index') !!}"><i class="fa fa-users"></i><span>Tercero Natural</span></a>
</li>

<li class="{{ Request::is('juridicos*') ? 'active' : '' }}">
    <a href="{!! route('juridicos.index') !!}"><i class="fa fa-building"></i><span>Tercero Jurídicos</span></a>
</li>


<li class="{{ Request::is('cargos*') ? 'active' : '' }}">
    <a href="{!! route('cargos.index') !!}"><i class="fa fa-circle-thin"></i><span>Cargos</span></a>
</li>

<li class="{{ Request::is('faccions*') ? 'active' : '' }}">
    <a href="{!! route('faccions.index') !!}"><i class="fa fa-circle-thin"></i><span>Facciones</span></a>
</li>
<li class="{{ Request::is('obligacions*') ? 'active' : '' }}">
    <a href="{!! route('obligacions.index') !!}"><i class="fa fa-circle-thin"></i><span>Obligaciones Espc.</span></a>
</li>

<li class="{{ Request::is('contratos*') ? 'active' : '' }}">
    <a href="{!! route('contratos.index') !!}"><i class="fa fa-edit"></i><span>Contratos</span></a>
</li>

