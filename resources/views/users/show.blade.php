@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>{{ $user->nom }} {{ $user->prenom }}</h1>
        <div class=" popup d-flex justify-content-around align-items-center">
                        <div class="user-info">
                            <span>role :</span> <p>{{ $user->role }}</p> <br>
                            <span>email :</span> <p>{{ $user->email }}</p> <br>
                            <span>telephone :</span> <p>{{ $user->telephone }}</p> <br>
                            <span>CIN :</span> <p>{{ $user->CIN }}</p> <br>
                            <span>ville :</span> <p>{{ $user->ville }}</p> <br>
                            <span>adresse :</span> <p>{{ $user->adresse }} </p> <br>
                        </div>
                    </div>
    </div>
@endsection