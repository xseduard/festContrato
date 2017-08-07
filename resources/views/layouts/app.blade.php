
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>FestContrato</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/deplocal/css/bootstrap-xlgrid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">    
    @stack('css-depLTE')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">
    {{-- toastr --}}
    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    {{-- Ionicons --}}
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    <link rel="stylesheet" href="/css/main.css">
    @stack('css')
    @yield('css')
</head>

<body class="skin-purple sidebar-mini">
<div class="wrapper">
    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
            <a href="#" class="logo">
                <span class="logo-mini"><b>F</b>CO</span>
                <span class="logo-lg"><b>Fest</b>Contrato</span>
            </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->                    
                        <!-- search form (Optional) -->
                        @if (empty(Route::getCurrentRoute()->parameters))
                             {!!  Form::open(['url' => Route::getCurrentRoute()->uri, 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'role' => 'search']) !!}                        
                                <div class="input-group navbar-form-custom">
                                    <input type="text" name="search" class="form-control" placeholder="Buscar..."/>
                              <span class="input-group-btn">
                                <button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                              </span>
                                </div>
                            {!! Form::close() !!} 
                        @else
                            {!!  Form::open(['url' => '#', 'class' => 'navbar-form navbar-left', 'role' => 'search']) !!}                        
                                <div class="input-group navbar-form-custom">
                                    <input type="text" title="Los filtros no esta disponibles en esta pagina" name="search" class="form-control" placeholder="Buscar..." disabled />
                              <span class="input-group-btn">
                                <button type='' title="Los filtros no esta disponibles en esta pagina" id='search-btn' class="btn btn-flat" disabled="true"><i class="fa fa-search"></i>
                                </button>
                              </span>
                                </div>
                            {!! Form::close() !!}   
                        @endif
                  
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="/multimedia/web/profile-default.png"
                                 class="user-image" alt="User Image"/>
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{!! Auth::user()->nombres !!}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="/multimedia/web/profile-default.png"
                                     class="img-circle" alt="User Image"/>
                                <p>
                                    {!! Auth::user()->fullname !!}
                                    <small> {{  Auth::user()->roles->pluck('display_name')->implode(', ') }}</small>
                                    <small>Miembro desde {!! ucwords(Auth::user()->created_at->format('F, Y')) !!}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/usuarios/{{ auth()->id() }}/edit" class="btn btn-default btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Cerrar Session
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Main Footer -->
    <footer class="main-footer" style="max-height: 100px;text-align: center">
        <strong>Copyright © 2017 <a href="https://transportedigital.com" target="_blank">FestContrato Technologies</a>.</strong> All rights reserved.
    </footer>

</div>


<!-- jQuery 3.1.1 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>

<script src="/js/main.js"></script>
@include('common.alert-toastr')

@yield('scripts')
@stack('scripts')
@include('common.partial_chat')

</body>
</html>