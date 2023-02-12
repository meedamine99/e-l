@extends('layouts.app')
@section('content')

<div class="container">
  <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
  <h2>Les matieres de formation {{$nom_formation}} </h2>
  
  <div class="les_card">
    @if (Auth::user()->role == "admin")
    <a href="{{route('matieres.create')}}"><i class="fa-solid fa-plus"></i> Créer matiere</a>
    @endif
   @if($message = Session::get('success'))
          <div>
            <p class="alert alert-success">{{$message}}</p>
          </div>
      @endif
    @if($message = Session::get('noAccess'))
    <div class="alert alert-danger">
      <p>{{$message}}</p>
    </div>
    @endif
    @if($matieres->count() > 0)
    @foreach ($matieres as $matiere)
    
        <div class="une_card">
            <a class="" href="{{ route('leçon.index', ['matiere' => $matiere->id, 'nom_matiere' => $matiere->nom_matiere ]) }}">{{ $matiere->nom_matiere }}</a>
        <div>
            {{ $matiere->formation->nom_formation }}
        </div>
        <div>
            <a class="btn btn-primary button-43" href="{{ route('leçon.index', ['matiere' => $matiere->id, 'nom_matiere' => $matiere->nom_matiere]) }}">les leçons</a>
            @if (Auth::user()->role == "admin")
            <a class="btn btn-primary button-43" href="{{ route('matieres.edit', $matiere->id) }}">Modifier</a>
              <form style="display: inline-block" action="{{ route('matieres.destroy', $matiere->id) }}" method="Post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="formation" id="" value=" {{$matiere->formation_id}} ">
                <button class="btn btn-danger" onclick="return confirm('do u really want to delete this leçon?')" type="submit">Supprimer</button>
              </form>
            @endif
        </div>

  
      </div>
      
    @endforeach
    @else
            <p class="text-center alert alert-danger">Aucun matiere dans la formation {{$nom_formation}}</p>
    @endif
    
  </div>

</div>


@endsection