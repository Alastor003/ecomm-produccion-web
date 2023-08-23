<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Accestore') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="d-flex flex-row">
  <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-secondary" style="width: 280px; height: 100vh;">
        <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('storage/logo.png') }}" class="logo" alt="imagen logo">
        Accestore
        </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li>
          <a class="nav-link text-light {{ request()->is('productos*') ? 'active' : '' }}"  aria-current="page" href="{{ route('productos.index') }}">Productos</a>
        </li>
        <li>
          <a class="nav-link text-light {{ request()->is('categorias*') ? 'active' : '' }}" aria-current="page" href="{{ route('categorias.index') }}">Categorias</a>
        </li>
        <li>
          <a class="nav-link text-light {{ request()->is('usuarios*') ? 'active' : '' }}"  aria-current="page" href="{{ route('usuarios.index') }}">Usuarios</a>
        </li>
        <li>
          <a class="nav-link text-light {{ request()->is('mensajes*') ? 'active' : '' }}"  aria-current="page" href="{{ route('mensajes.index') }}">Mensajes</a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::user()->name }}
        </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li class="nav-item dropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Cerrar Sesión') }}
                </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
              </form>
          </li>
        </ul>
      </div>
  </div>
  <div class="content p-5 ml-0" style="flex-grow: 1;"> <!-- Usamos flex-grow para que ocupe el espacio restante -->
      @yield('content')
  </div>
</div>    
</body>

