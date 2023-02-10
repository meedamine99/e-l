<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'e-learning') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        @vite([ 'resources/css/welcome.css', 'resources/sass/app.scss','resources/js/app.js','resources/js/welcome.js'])
        <style>
            body {
                background-color:  #F2F2F3 !important;
            }
        </style>
    </head>
    <body>


        <div class="container">
        <div class="preloader"></div>
    </div>
    <div id="page">
        <div class="shine"></div>
        
            <nav class="navMenu navbar navbar-expand-lg ">
                <a href="/" class="navbar-brand d-inline-block">
                    <div class="logo links">
                        <div class="closed-sq c1"></div>
                        <div class="opened-sq o1"></div>
                        <div class="opened-sq o2"></div>
                        <div class="closed-sq c2"></div>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarNav" >
                    <ul class="navbar-nav w-100 d-flex justify-content-between">
                        <li class="nav-item m-aut">
                            <ul class="navbar-nav">
                                <li class="nav-item first-link"><a class="links" href="/#hero">Accueil</a></li>
                                <li class="nav-item"><a class="links" href="/#about">A propos</a></li>
                                <li class="nav-item"><a class="links" href="/#service">Services</a></li>
                                <li class="nav-item"><a class="links" href="/#contact">Contact</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <div class="">
                                @if (Route::has('login'))
                                    <div >
                                    @auth
                                        <a class="links auth" href="{{ url('/home') }}">Table de bord</a>
                                        @else
                                        <a class="links auth" href="{{ route('login') }}">Log in</a>
                                        @if (Route::has('register'))
                                        <a class="links auth" href="{{ route('register') }}">Register</a>
                                        @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('content')

            </body>
</html>