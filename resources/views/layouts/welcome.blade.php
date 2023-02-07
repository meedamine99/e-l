<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'e-learning') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />


        @vite([ 'resources/css/welcome.css','resources/js/app.js'])
        
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
                    <a class="links" href="/#hero">Home</a>
                    <a class="links" href="/#about">about</a>
                    <a class="links" href="/#service">services</a>
                    <a class="links" href="/#contact">contact</a>
                </div>
                <div class="">
                    @if (Route::has('login'))
                        <div >
                            @auth
                                <a class="links auth" href="{{ url('/home') }}">dashboard</a>
                            @else
                                <a class="links auth" href="{{ route('login') }}">Log in</a>
            
                                @if (Route::has('register'))
                                    <a class="links auth" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    
                </div>
            </nav>
            @yield('content')

               </body>
</html>