
@extends('layouts.app')
@section('content')

<div class="container">
    <a href="{{ url()->previous() }}" ><i class="fa-solid fa-left-long"></i></a>
    <h2>Emploi du temps</h2>

        <div class="les_card">
            @foreach ($sessions as $time)
                        <div class="une_card">
                            <div>{{$time->matiere->nom_matiere}}</div>
                            {{$time->day}}
                            {{$time->heur_start}}
                            --
                            {{$time->heur_end}}
                            <div>
                                {{$time->user->nom}}
                                {{$time->user->prenom}}
                            </div>
                                                
                        </div>
                @endforeach
        </div>
    </div>
    
@endsection
