@extends('layouts.app')
@section('content')

<div class="container">
  <a href="{{ url()->previous() }}" ><i class="fa-solid fa-left-long"></i></a>
  <h2>Les matieres</h2>
  
  <div class="les_card">
    @if (Auth::user()->role == "admin")
    <a href="{{route('matieres.create')}}"><i class="fa-solid fa-plus"></i> Créer matiere</a>
    @endif
    @if($message = Session::get('success'))
    <div class="text-success" role="alert">
      {{$message}}
    </div>
    @endif
    @if($message = Session::get('noAccess'))
    <div class="alert alert-danger">
      <p>{{$message}}</p>
    </div>
    @endif
    @foreach ($matieres as $matiere)
      @if($formation == $matiere->formation_id)
        <div class="une_card">
            <a class="" href="{{ route('leçon.index', ['matiere' => $matiere->id]) }}">{{ $matiere->nom_matiere }}</a>
        <div>
            {{ $matiere->formation->nom_formation }}
        </div>
        <div>
            <a class="btn btn-primary button-43" href="{{ route('leçon.index', ['matiere' => $matiere->id]) }}">les leçons</a>
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