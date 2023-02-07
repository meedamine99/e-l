@extends('layouts.app')
@section('content')




  <div class="container">
    <h1>les formations</h1>
    @if($message = Session::get('success'))
        <div>
          <p >{{$message}}</p>
        </div>
    @endif
    @if (Auth::user()->role == "admin")
        <a id="create" href="{{route('formation.create')}}"> <i class="fa-solid fa-plus"></i> create formation</a>
    @endif
    <div class="les_card">
    @foreach ($formation as $formation)
      <div class="une_card">
        <a class="" href="{{ route('matieres.index', ['formation' => $formation->id]) }}">{{ $formation->nom_formation }}</a>
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
            
            <a class="btn btn-primary button-43" href="{{ route('matieres.index', ['formation' => $formation->id]) }}">les matieres </a>
          </div>
        </div>
        @endforeach
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection