@extends('layouts.app')
@section('content')
@vite(['resources/css/dashboard.css'])

<div class="container">
    <h1 class="iname"> DASHBOARD</h1>
        <div class="date">
            {{$date}}

        </div>
    <div class="boxs">
        <div class="box">
            <div class="top">
                <p class="heading">Nombre Totale</p>
                <i class="fa-solid fa-users-line"></i>
            </div>
            <div class="bottom">
               {{ $userCount}}
            </div>
        </div>
        <div class="box">
            <div class="top">
                <p class="heading">Nombre formateur</p>
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
                <p class="heading">Nombre last week</p>
                <i class="fa-solid fa-users"></i>
            </div>
            <div class="bottom">
               {{$userCountLastWeek}}
            </div>
        </div>
        <div class="box">
            <div class="top">
                <p class="heading">Nombre d'étudiants<br>access</p>
                <i class="fa-solid fa-user-check"></i>
            </div>
            <div class="bottom">
                {{$usersAccess}}
            </div>
        </div>
        <div class="box">
            <div class="top">
                <p class="heading">Nombre d'étudiants<br>non access</p>
                <i class="fa-solid fa-user-xmark"></i>
            </div>
            <div class="bottom">
                {{$usersNonAccess}}
            </div>
        </div>
    </div>
    
@endsection