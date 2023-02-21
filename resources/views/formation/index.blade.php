@extends('layouts.app')
@section('content')




  <div class="container">
    <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
    <h2>Les formations</h2>
    <div class="les_card">
      @if($message = Session::get('success'))
          <div>
            <p class="alert alert-success">{{$message}}</p>
          </div>
      @endif
      @if (Auth::user()->role == "admin")
          <a id="create" href="{{route('formation.create')}}"> <i class="fa-solid fa-plus"></i> Créer formation</a>
      @endif
    @if($formation->count() > 0)
    @foreach ($formation as $formation)
      <div class="une_card">
        <a class="" href="{{ route('matieres.index', ['formation' => $formation->id, 'nom_formation' => $formation->nom_formation]) }}">{{ $formation->nom_formation }}</a>
        <div>
          {{$formation->type}}
        </div>
        <div>
          <strong>début: </strong> {{ $formation->date_début }} -- 
          <strong>fin: </strong>{{ $formation->date_fin }}
        </div>
        
          <div>
            @if (Auth::user()->role == "admin")
            <a class="btn btn-primary button-43" href="{{ route('formation.edit', $formation->id) }}">Modifier</a>
            <form style="display: inline-block" action="{{ route('formation.destroy', $formation->id) }}" method="Post">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" onclick="return confirm('do u really want to delete this formation?')" type="submit">Supprimer</button>
            </form>
            @endif
            
            <a class="btn btn-primary button-43" href="{{ route('matieres.index', ['formation' => $formation->id, 'nom_formation' => $formation->nom_formation]) }}">les matieres </a>
          </div>
        </div>
        @endforeach
        @else
            <p class="text-center alert alert-danger">Aucun formation</p>
        @endif
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection