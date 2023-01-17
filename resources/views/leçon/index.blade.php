@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header">{{__('leçon')}}</div>
          <div class="card-body">

            
     {{--        <form  action="{{url('/search')}}">
  <div style="margin-left: 640px" class="textbox"> 
    <input type="text" name="query" placeholder="search leçon" >
  </div> --}}
</form>
<div class="table">
  
  @if($message = Session::get('success'))
  <div class="success">
    <p>{{$message}}</p>
  </div>
  @endif
  <table class="table">
    <a id="create" href="{{route('leçon.create')}}">creer</a>
    <tr class="bg-info">
      <th>ID</th>
      <th>nom_leçon</th>
      <th>type</th>
    </tr>
    @foreach ($leçon as $leçon)
    <tr>
      <th>{{ $leçon->id }}</th>
      <td>{{ $leçon->nom_leçon }}</td>
      <td>{{ $leçon->type }}</td>
      <td>
        <a class="btn btn-primary" href="{{ route('leçon.edit', $leçon->id) }}">Modifier</a>
        <a class="btn btn-primary" href="{{ route('matieres.index', ['leçon' => $leçon->id]) }}">matieres</a>
        <a class="btn btn-primary" href="{{ route('leçon.show', $leçon->id) }}">show</a>
        <form style="display: inline-block" action="{{ route('leçon.destroy', $leçon->id) }}" method="Post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" onclick="return confirm('do u really want to delete this leçon?')" type="submit">Supprimer</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection