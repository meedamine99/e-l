@extends('layouts.app')
@section('content')

<style>
    .une_card a{
      margin-inline: .5em;
    }
</style>

<div class="container">
  <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
<h2>Les leçons de {{$nom_matiere}} </h2>

            

</form>
<div>
  
  <div class="les_card">
    @if($message = Session::get('success'))
    <div class="success">
      <p class="alert alert-success">{{$message}}</p>
    </div>
    @endif
      @if (Auth::user()->role == "admin")
        <a id="create" href="{{route('lecon.create')}}"><i class="fa-solid fa-plus"></i> créer leçon</a>
      @endif
      @if($lecon->count() > 0)
    @foreach ($lecon as $lecon)
    
    <div class="une_card">
      <div>
        {{$lecon->nom}}
      </div>
      <div>
        <a href="{{route("videos.index" , ['lecon' => $lecon->id])}}">Vidéos</a>
        <a href="{{route("pdfs.index" , ['lecon' => $lecon->id])}}">Pdfs</a>
      </div>
      @if (Auth::user()->role == "admin")
      <div>
        <a class="btn btn-primary button-43" href="{{ route('lecon.edit', $lecon->id) }}">Modifier</a>
        <form style="display: inline-block" action="{{ route('lecon.destroy', $lecon->id) }}" method="Post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="matiere" id="" value=" {{$lecon->matiere_id}} ">
          <button class="btn btn-danger" onclick="return confirm('do u really want to delete this lecon?')" type="submit">Supprimer</button>
        </form>
      </div>
        @endif
    </div>
    
    
    @endforeach
    @else
            <p class="text-center alert alert-danger">Aucun leçon dans la matiere {{$nom_matiere}}</p>
    @endif
  </div>
</div>
@endsection