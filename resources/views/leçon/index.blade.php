@extends('layouts.app')
@section('content')
<div class="container">
<h1>les leçons</h1>

            

</form>
<div>
  
  @if($message = Session::get('success'))
  <div class="success">
    <p>{{$message}}</p>
  </div>
  @endif
    @if (Auth::user()->role == "admin")
      <a id="create" href="{{route('leçon.create')}}"><i class="fa-solid fa-plus"></i> create leçon</a>
    @endif
  <div class="les_card">
    @foreach ($leçon as $leçon)
    @if($matieres == $leçon->matiere_id)
    <div class="une_card">
      <div>
        {{$leçon->nom}}
      </div>
      <div>
        <a href="{{route("videos.index" , ['leçon' => $leçon->id])}}">videos</a>
        <a href="{{route("pdfs.index" , ['leçon' => $leçon->id])}}">pdfs</a>
      </div>
      @if (Auth::user()->role == "admin")
      <div>
        <a class="btn btn-primary button-43" href="{{ route('leçon.edit', $leçon->id) }}">Modifier</a>
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