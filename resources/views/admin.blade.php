@extends('layouts.app')
@section('content')
@vite(['resources/css/dashboard.css' /* ,'resources/js/mibian.js'  */])

<div class="container">
    
    <h1 class="iname"> DASHBOARD</h1>
        <div class="date">
            {{$date}}

        </div>
    <div class="boxs">
        <div class="box">
            <div class="top">
                <p class="heading">Nombre Total</p>
                <i class="fa-solid fa-users-line"></i>
            </div>
            <div class="bottom">
               {{ $userCount}}
            </div>
        </div>
        <div class="box">
            <div class="top">
                <p class="heading">Nombre formateurs</p>
                <i class="fa-solid fa-chalkboard-user"></i>
            </div>
            <div class="bottom">
               {{$formateurCount}}
            </div>
        </div>
        <div class="box">
            <div class="top">
                <p class="heading">Nombre d'étudiants</p>
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <div class="bottom">
               {{$etudCount}}
            </div>
        </div>
        <div class="box">
            <div class="top">
                <p class="heading">Nombre <br> dernier semaine</p>
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="bottom">
               {{$userCountLastWeek}}
            </div>
        </div>
        <div class="box">
            <div class="top">
                <p class="heading">Nombre d'étudiants<br>accès</p>
                <i class="fa-solid fa-user-check"></i>
            </div>
            <div class="bottom">
                {{$usersAccess}}
            </div>
        </div>
        <a class="nonAccess" href=" {{route('users.nonAccess')}} ">
            <div class="box">
                <div class="top">
                    <p class="heading">Nombre d'étudiants<br>non accès</p>
                    <i class="fa-solid fa-user-xmark"></i>
                </div>
                <div class="bottom">
                    {{$usersNonAccess}}
                </div>
            </div>
        </a>
           
    </div>

<canvas id="myChart"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($dates),
            datasets: [{
                label: 'Nombre des formateurs',
                data: @json($teacherCounts),
                backgroundColor:'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                fill: true
            },
            {
                label: 'Nombres des etudiants',
                data: @json($userCounts),
                backgroundColor:'#24acdc33',
                borderColor: '#24acdc',
                borderWidth: 1,
                fill: true
            }
        ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: false
                    }
                }]
            }
        }
    });
</script>
    
    
@endsection