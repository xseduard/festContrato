<li class="{{ Request::is('home*') ? 'active' : '' }}">
    <a href="{!! url('/home') !!}"><i class="fa fa-home"></i><span>Inicio</span></a>
</li>
<li class="{{ Request::is('triangles*') ? 'active' : '' }}">
    <a href="{!! route('triangles.index') !!}"><i class="fa fa-edit"></i><span>Triangles</span></a>
</li>

