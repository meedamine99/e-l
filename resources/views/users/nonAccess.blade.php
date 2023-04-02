@extends('layouts.app')
@section('content')
<div class="container">
    <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
    <h2>étudiants non access</h2>
    <div class="les_card">
        @if($nonAccess->count() > 0)
            @foreach ($nonAccess as $etud)
            <div class="une_card">
                <div>
                    {{$etud->CIN}}
                </div>
                <div>
                    <a href=" {{route('access.index', ['user' => $etud->id, 'userName' => $etud->nom])}} ">{{ $etud->nom }}</a>
                    <a href=" {{route('access.index', ['user' => $etud->id, 'userName' => $etud->nom])}} ">{{$etud->prenom}}</a>
        
                </div>
                <div>
                    <button class="btn btn-primary button-43"  type="submit"> <a href="{{ route('users.show', $etud->id) }}" id="a">Show</a></button>
                </div>
            </div>
            @endforeach
        @else
            <p class="text-center alert alert-danger">Aucun étudiant sans accès</p>
        @endif
    </div>
    
</div>
@endsection