@extends('layouts.app')
@section('content')

<div class="container">
    <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
    <h2>Emploi du temps</h2>
    <div class="les_card">
            <a href=" {{route('adminTimeTable.create')}} "><i class="fa-solid fa-plus"></i> Créer une session</a>
            @if($adminTimeTable->count() > 0)
            @foreach($adminTimeTable as $time)
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
                                                
                            <div>
                                <a class="btn btn-primary button-43" href="{{ route('adminTimeTable.edit', $time->id) }}">Modifier</a>
                                <form style="display: inline-block" action="{{ route('adminTimeTable.destroy', $time->id) }}" method="Post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" onclick="return confirm('do u really want to delete this formation?')" type="submit">Supprimer</button>
                                </form>
                            </div>
                        </div>
                @endforeach
            @else
                <p class="text-center alert alert-danger">Aucun session</p>
            @endif
        </div>
    </div>
    <script>
        
    </script>
@endsection