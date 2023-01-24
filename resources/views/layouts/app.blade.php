<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/app.css',])
</head>
<body>
    <nav class="navMenu">
        <a href="/">
            <div class="logo links">
                <div class="closed-sq c1"></div>
                <div class="opened-sq o1"></div>
                <div class="opened-sq o2"></div>
                <div class="closed-sq c2"></div>
            </div>
        </a>
        <div>
            <a class="links" href=" {{route('home')}} ">home</a>
            <a class="links" href=" {{route('formation.index')}} ">Les formation</a>
            {{-- <a class="links" href=" {{route('contenu.index')}} ">emloi du temps</a> --}}
            @if( Auth::user()->role == "admin" )
                <a class="links" href=" {{route('users.index')}} ">users</a>
            @endif
            <a class="links" href="#contact">contact</a>
        </div>
        <div>
            <div class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nom }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
    

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
