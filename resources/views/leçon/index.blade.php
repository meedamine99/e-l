@extends('layouts.app')
@section('content')
<div class="container">
  <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
<h2>Les leçons </h2>

            

</form>
<div>
  
  <div class="les_card">
    @if($message = Session::get('success'))
    <div class="success">
      <p class="alert alert-success">{{$message}}</p>
    </div>
    @endif
      @if (Auth::user()->role == "admin")
        <a id="create" href="{{route('leçon.create')}}"><i class="fa-solid fa-plus"></i> créer leçon</a>
      @endif
    @foreach ($leçon as $leçon)
    @if($matieres == $leçon->matiere_id)
    <div class="une_card">
      <div>
        {{$leçon->nom}}
      </div>
      <div>
        <a href="{{route("videos.index" , ['leçon' => $leçon->id])}}">Vidéos</a>
        <a href="{{route("pdfs.index" , ['leçon' => $leçon->id])}}">Pdfs</a>
      </div>
      @if (Auth::user()->role == "admin")
      <div>
        <form style="display: inline-block" action="{{ route('leçon.destroy', $leçon->id) }}" method="Post">
          @csrf
          @method('DELETE')
          <input type="hidden" name="matiere" id="" value=" {{$leçon->matiere_id}} ">
          <button class="btn btn-danger" onclick="return confirm('do u really want to delete this leçon?')" type="submit">Supprimer</button>
        </form>
      </div>
        @endif
    </div>
    
    @endif
    @endforeach
  </div>
</div>
@endsection