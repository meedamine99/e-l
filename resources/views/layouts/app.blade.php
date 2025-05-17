<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'e-learning') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com"> 
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
""
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/cards.css' ,'resources/css/app.css','resources/js/app.js', 'resources/js/nav.js'])
    <style>
        .logo {
            animation: none;
        }
    </style>
</head>
<body>       
    <nav class="navMenu">
        <a href="/e-learning-pro_2/public">
            <div class="logo">
                home
            </div>
        </a>
        <div class="options">
            
            @if( Auth::user()->role == "admin" )
            <a class="links" href=" {{route('home')}} "><i class="fa-solid fa-house"></i><span class="menuoptions optiontransition ">Tableaux de bord</span></a>
            <a class="links" href=" {{route('users.index')}} "><i class="fa-solid fa-users"></i><span class="menuoptions optiontransition ">Utilisateurs</span></a>
            <a class="links" href=" {{route('adminTimeTable.index')}} "><i class="fa-regular fa-calendar-days"></i><span class="menuoptions optiontransition ">Emploi du temps</span></a>
            
            @else
                <a class="links" href=" {{route('home')}} "><i class="fa-solid fa-house"></i><span class="menuoptions optiontransition ">Accueil</span></a>
                <a class="links" href=" {{route('timeTable.index')}} "><i class="fa-regular fa-calendar-days"></i><span class="menuoptions optiontransition ">Emploi du temps</span></a>
            @endif
                <a class="links" href=" {{route('formation.index')}} "><i class="fa-sharp fa-solid fa-book"></i><span class="menuoptions optiontransition ">Formations</span></a>
        </div>
        <div class="d-flex flex-column align-items-center gap-2">
            
            <div class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   <i class="fa-solid fa-circle-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="links" href=" {{route('profile.changeInformations', auth()->user()->id)}} ">changer informations</a>
                    <a class="links" href=" {{route('profile.changePassword', auth()->user()->id)}} ">changer le mot de passe</a>
                </div>
            </div>
            
                
                    <a  class="links" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
    
        <style>
            
        </style>
        <div class="main">
            <span class="bars"><i class="fa-solid fa-bars"></i></span>
            @yield('content')
        </div>
    </div>
   
        <script>
        const bars = document.querySelector('.bars');
        
        const navMenu = document.querySelector('.navMenu');
        bars.addEventListener('click', function() {
            navMenu.classList.toggle('toggel');
            bars.classList.toggle('lefti');
            // bars.style.left = "90px";
        })
        
    </script>
 
</body>

</html>
