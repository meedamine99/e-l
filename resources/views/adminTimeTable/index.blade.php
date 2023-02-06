@extends('layouts.app')
@section('content')

<div class="container">
        <a href=" {{route('adminTimeTable.create')}} ">create</a>
        <div class="les_card">
            @foreach($adminTimeTable as $time)
                        <div class="une_card">
                            <div>{{$time->matiere->nom_matiere}}</div>
                            {{$time->heur_start}}
                            --
                            {{$time->heur_end}}
                            {{$time->day}}
                            <div>
                                {{$time->user->nom}}
                                {{$time->user->prenom}}
                            </div>
                                                </td>
                                                <div>
                            <a class="btn btn-primary" href="{{ route('adminTimeTable.edit', $time->id) }}">Modifier</a>
                            <form style="display: inline-block" action="{{ route('adminTimeTable.destroy', $time->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('do u really want to delete this formation?')" type="submit">Supprimer</button>
                            </form>
                                                </div>
                        </div>
                @endforeach
        </div>
    </div>
    <script>
        
    </script>
@endsection