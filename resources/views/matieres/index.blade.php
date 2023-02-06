@extends('layouts.app')
@section('content')

<div class="container">
  <h1>les matieres</h1>
  @if (Auth::user()->role == "admin")
  <a href="{{route('matieres.create')}}">create matiere</a>
  @endif
  @if($message = Session::get('success'))
  <div class="text-success" role="alert">
    {{$message}}
  </div>
  @endif
  <div class="les_card">
    @foreach ($matieres as $matiere)
      @if($formation == $matiere->formation_id)
        <div class="une_card">
            <a class="" href="{{ route('leçon.index', ['matiere' => $matiere->id]) }}">{{ $matiere->nom_matiere }}</a>
        <div>
            {{ $matiere->formation->nom_formation }}
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('leçon.index', ['matiere' => $matiere->id]) }}">les leçons</a>
            @if (Auth::user()->role == "admin")
              <form style="display: inline-block" action="{{ route('matieres.destroy', $matiere->id) }}" method="Post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="formation" id="" value=" {{$matiere->formation_id}} ">
                <button class="btn btn-danger" onclick="return confirm('do u really want to delete this leçon?')" type="submit">Supprimer</button>
              </form>
            @endif
        </div>

  
      </div>
      @endif
    @endforeach
  </div>

</div>


@endsection