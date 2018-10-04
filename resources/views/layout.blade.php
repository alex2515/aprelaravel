<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mi Sitio</title>
  <link rel="stylesheet" href="/css/bootstrap.min.css">
	<style>
		.active{
			text-decoration: none;
			color: green;
		}
		.error{
			color: red;
			font-size: 12px;
		}
	</style>
  <!-- Bootstrap Css </!-->
  {{-- <link rel="stylesheet" href="/css/bootstrap.min.css"> --}}
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ activeMenu('/') }}">
          <a href="{{ route('home') }}">Inicio</a>
        </li>
        <li class="{{ activeMenu('saludos/*') }}">
          <a href="{{ route('saludos', 'Alexander') }}">Saludo</a>
        </li>
        <li class="{{ activeMenu('mensajes/create') }}">
          <a href="{{ route('mensajes.create') }}">Contacto</a>
        </li>
        @if (auth()->check())
          <li class="{{ activeMenu('mensajes') }}">
            <a href="{{ route('mensajes.index') }}">Mensaje</a>
          </li>
          @if ( auth()->user()->role === "admin")
            <li class="{{ activeMenu('usuarios/create') }}">
              <a href="{{ route('usuarios.index') }}">Usuarios</a>
            </li>
          @endif
        @endif



      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (auth()->guest()) <!-- Verifica si es usuario invitado -->
          <li class="dropdown">
            <a href="/login" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="{{ activeMenu('login') }}">
                <a  href="/login">Login</a>
              </li>
            </ul>
          </li>
        @endif
        @if (auth()->check()) <!-- Verifica si hay usuario auntenticado -->
          <li class="dropdown">
            <a href="/login" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="{{ activeMenu('mensajes') }}">
                <a href="{{ route('mensajes.index') }}">Mensajes</a>
              </li>
              <li>
                  <a href="/logout">Cerrar Sesión de {{ auth()->user()->name }}</a>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

	<header>
		<?php
		function activeMenu($url)
		{
			return request()->is($url) ? 'active' : '';
		}
			
		?>
		<nav>

		</nav>
	</header>
<div class="container">
  @yield('content')
</div>
	<hr>
	<footer>Copyright Todos los derechos reservados - 2018</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
{{-- <script src="js/bootstrap.min.js"></script> --}}
<script src="/js/bootstrap.min.js"></script>
{{-- <script src="js/jquery-1.12.4.min.js"></script> --}}
</html>