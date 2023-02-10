@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
        <h2>{{ $user->nom }} {{ $user->prenom }}</h2>
        <div class=" popup d-flex justify-content-around align-items-center">
                        <div class="user-info">
                            <span>Role :</span> <p>{{ $user->role }}</p> <br>
                            <span>Email :</span> <p>{{ $user->email }}</p> <br>
                            <span>Telephone :</span> <p>{{ $user->telephone }}</p> <br>
                            <span>CIN :</span> <p>{{ $user->CIN }}</p> <br>
                            <span>Ville :</span> <p>{{ $user->ville }}</p> <br>
                            <span>Adresse :</span> <p>{{ $user->adresse }} </p> <br>
                        </div>
                    </div>
    </div>
@endsection