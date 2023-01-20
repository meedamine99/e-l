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
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        <style>
        :root {
    --clr-primary: #393943;
    --clr-secondary: #F2F2F3;
    --clr-accent: #24acdc;
}

*,
*::before,
*::after {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}
        .logo {
    position: absolute;
    transform: translate(-50%, -50%);
    width: 50px;
    height: 50px;
    animation: wi 2s infinite;
}
body{
    background-color: var(--clr-secondary)
}

.closed-sq,
.opened-sq {
    border-radius: 2px;
    position: absolute;
    animation: ro 2s infinite;
}

.closed-sq {
    background-color: #24acdc;
    width: 20px;
    height: 20px;
}

.opened-sq {
    border: 3px solid #24acdc;
    width: 25px;
    height: 25px;
}

.c1 {
    left: 3px;
    top: 3px;
}

.o1 {
    right: 0;
    top: 0;
}

.o2 {
    bottom: 0;
    left: 0;
}

.c2 {
    bottom: 3px;
    right: 3px;
}

@-webkit-keyframes wi {

    0%,
    30% {
        width: 50px;
        height: 50px;
    }

    70% {
        height: 70px;
        width: 70px;
    }

    100% {
        height: 50px;
        width: 50px;
    }
}

@-webkit-keyframes ro {

    0%,
    30% {
        transform: rotate(0);
    }

    70% {
        transform: rotate(180deg);
    }

    100% {
        transform: rotate(-90deg);
    }
}
        .navMenu {
    margin-bottom: 5em;
    background-color: var(--clr-secondary);

    
    width: 100%;
    padding:1em  4em;
    

    display: flex;
    justify-content: space-between;
    align-items: center;
    
}

.navMenu a {
    padding: .5em .5em;
    color: var(--clr-accent);
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 500;
    display: inline-block;
    padding-inline: 0.5em;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.navMenu a:hover {
    color: var(--clr-primary);
    /* transform: scale(1.1); */
    letter-spacing: 2px;

}

.auth {
    display: inline-block;
    text-decoration: underline;

    padding-inline: 1em;
}
    </style>
    </style>
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
            <a class="links" href="#hero">Home</a>
            <a class="links" href="#about">about</a>
            <a class="links" href="#service">services</a>
            <a class="links" href="#contact">contact</a>
        </div>
        <div>
            <div class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{-- {{ Auth::user()->nom }} --}}
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
