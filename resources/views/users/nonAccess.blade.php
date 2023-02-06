@extends('layouts.app')
@section('content')
<div class="container">
    <h1>étudiants non access</h1>
    <div class="les_card">
        @foreach ($nonAccess as $etud)
        <div class="une_card">
            <div>
                {{$etud->CIN}}
            </div>
            <div>
                <a href=" {{route('access.index', ['user' => $etud->id, 'userName' => $etud->nom])}} ">{{ $etud->nom }}</a>
                <a href=" {{route('access.index', ['user' => $etud->id, 'userName' => $etud->nom])}} ">{{$etud->prenom}}</a>
    
            </div>
        </div>
        @endforeach
    </div>
    
</div>
@endsection