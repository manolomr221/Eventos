<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 
<!--Font Awesome (added because you use icons in your prepend/append)-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style>
#logout{  color:black;}
#menu{
    position: absolute;
    font-size: 17px;
  top: 5px;
  right: 200px;
}

#menu2{
    position: absolute;
  font-size: 17px;
  top: 5px;
  right: 30px;
}
#menuAdmin{
    position: absolute;
  font-size: 17px;
  top: 5px;
  right: 20px;
}
</style>
<body>
    <div id="app">
        <nav class="navbar-expand-md navbar-light navbar-laravel " id="nav">
            <div class="container">
                <a style="color:#fff" class="navbar-brand" href="{{ url('/') }}">
                    Eventop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item" id="menu">
                                <a style="color:#fff" class="nav-link" href="{{ url('/Academicos') }}">{{ __('Eventos Academicos') }}</a>
                            </li>
                            <li class="nav-item" id="menu2">
                                    <a style="color:#fff" class="nav-link" href="{{ url('/Culturales') }}">{{ __('Eventos Culturales') }}</a>
                                </li>
                            @if (Route::has('register'))
                               
                            @endif
                        @else
                            <li class="nav-item dropdown" id="menuAdmin">
                                <a style="color:#fff" id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                    @if (Auth::user()->is_admin == true)
                            [Admin]
                        @endif
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a id="logout" class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main >
            @yield('content')
        </main>
        
    </div>
</body>
</html>