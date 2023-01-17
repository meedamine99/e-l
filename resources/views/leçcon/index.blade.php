@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header">{{__('leçcon')}}</div>
          <div class="card-body">

            
     {{--        <form  action="{{url('/search')}}">
  <div style="margin-left: 640px" class="textbox"> 
    <input type="text" name="query" placeholder="search leçcon" >
  </div> --}}
</form>
<div class="table">
  
  @if($message = Session::get('success'))
  <div class="success">
    <p>{{$message}}</p>
  </div>
  @endif
  <table class="table">
    <a id="create" href="{{route('leçcon.create')}}">creer</a>
    <tr class="bg-info">
      <th>ID</th>
      <th>nom_leçcon</th>
      <th>type</th>
    </tr>
    @foreach ($leçcon as $leçcon)
    <tr>
      <th>{{ $leçcon->id }}</th>
      <td>{{ $leçcon->nom_leçcon }}</td>
      <td>{{ $leçcon->type }}</td>
      <td>
        <a class="btn btn-primary" href="{{ route('leçcon.edit', $leçcon->id) }}">Modifier</a>
        <a class="btn btn-primary" href="{{ route('matieres.index', ['leçcon' => $leçcon->id]) }}">matieres</a>
        <a class="btn btn-primary" href="{{ route('leçcon.show', $leçcon->id) }}">show</a>
        <form style="display: inline-block" action="{{ route('leçcon.destroy', $leçcon->id) }}" method="Post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" onclick="return confirm('do u really want to delete this leçcon?')" type="submit">Supprimer</button>
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