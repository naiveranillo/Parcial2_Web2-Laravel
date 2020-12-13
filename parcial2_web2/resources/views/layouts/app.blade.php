<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css" integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ==" crossorigin="anonymous" />
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand shadow-md" 
        style="
            padding: 0; 
            margin: 0;
            font-size: 1.2rem;
            
        ">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    {{ __('Inicio') }}
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        @guest
                        @else
                            @if(Auth::user()->rol == 'administrador')
                                <li class="ul-menu nav-item pr-5 pl-5">
                                    <a class="nav-link" type="button" data-toggle="collapse"
                                    data-target="#menu-usu">Gestion de Usuario</a>
                                </li>
                                
                                <li class="ul-menu nav-item pl-5 pr-5">
                                    <a class="nav-link" type="button" data-toggle="collapse" 
                                    data-target="#menu-libro">Gestion de Libros</a>
                                </li>
                            @else
                                <li class="ul-menu nav-item pl-5 pr-5">
                                    <a class="nav-link" type="button" data-toggle="collapse" 
                                    data-target="#menu-libro-usu">Gestion de Libros</a>
                                </li>
                                
                            @endif
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif --}}
                        @else
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="salir">
                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="menu collapse navbar-collapse" id="menu-usu">                  
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ url('usuarios/create') }}">{{ __('Crear Usuario') }}</a>
                <a class="nav-item nav-link" href="{{ url('usuarios') }}">Listar</a>
                
            </div>
        </div>
        <div class="menu-uno collapse navbar-collapse" id="menu-libro">
            <div>
                <a class="nav-item nav-link" href="{{ url('libros/create') }}">Agregar</a>
                <a class="nav-item nav-link" href="{{ url('libros') }}">Listar</a>
            </div>
        </div>
        <div class="menu-uno collapse navbar-collapse" id="menu-libro-usu">
            <div>
                <a class="nav-item nav-link" href="{{ url('libros') }}">Listar</a>
            </div>
        </div>
        <script>
            function abrirMenuUsuario() {
                var menu = document.getElementById('sidebar-usuario');
                console.log('hola');
                menu.classList.add('abrir-menu-usuario');
            } 
        </script>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
