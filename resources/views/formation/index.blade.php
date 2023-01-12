@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header">{{__('formation')}}</div>
          <div class="card-body">

            
     {{--        <form  action="{{url('/search')}}">
  <div style="margin-left: 640px" class="textbox"> 
    <input type="text" name="query" placeholder="search formation" >
  </div> --}}
</form>
<div class="table">
  
  @if($message = Session::get('success'))
  <div class="success">
    <p>{{$message}}</p>
  </div>
  @endif
  <table class="table">
    <a id="create" href="{{route('formation.create')}}">creer</a>
    <tr class="bg-info">
      <th>ID</th>
      <th>nom_formation</th>
      <th>type</th>
    </tr>
    @foreach ($formation as $formation)
    <tr>
      <th>{{ $formation->id }}</th>
      <td>{{ $formation->nom_formation }}</td>
      <td>{{ $formation->type }}</td>
      <td>
        <a class="btn btn-primary" href="{{ route('formation.edit', $formation->id) }}">Modifier</a>
        <a class="btn btn-primary" href="{{ route('matieres.index', ['formation' => $formation->id]) }}">matieres</a>
        <a class="btn btn-primary" href="{{ route('formation.show', $formation->id) }}">show</a>
        <form style="display: inline-block" action="{{ route('formation.destroy', $formation->id) }}" method="Post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" onclick="return confirm('do u really want to delete this formation?')" type="submit">Supprimer</button>
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