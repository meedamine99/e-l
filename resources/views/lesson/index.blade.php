@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header">{{__('lesson')}}</div>
          <div class="card-body">

            
     {{--        <form  action="{{url('/search')}}">
  <div style="margin-left: 640px" class="textbox"> 
    <input type="text" name="query" placeholder="search lesson" >
  </div> --}}
</form>
<div class="table">
  
  @if($message = Session::get('success'))
  <div class="success">
    <p>{{$message}}</p>
  </div>
  @endif
  <table class="table">
    <a id="create" href="{{route('lesson.create')}}">creer</a>
    <tr class="bg-info">
      <th>ID</th>
      <th>nom_lesson</th>
      <th>type</th>
    </tr>
    @foreach ($lesson as $lesson)
    <tr>
      <th>{{ $lesson->id }}</th>
      <td>{{ $lesson->nom_lesson }}</td>
      <td>{{ $lesson->type }}</td>
      <td>
        <a class="btn btn-primary" href="{{ route('lesson.edit', $lesson->id) }}">Modifier</a>
        <a class="btn btn-primary" href="{{ route('matieres.index', ['lesson' => $lesson->id]) }}">matieres</a>
        <a class="btn btn-primary" href="{{ route('lesson.show', $lesson->id) }}">show</a>
        <form style="display: inline-block" action="{{ route('lesson.destroy', $lesson->id) }}" method="Post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" onclick="return confirm('do u really want to delete this lesson?')" type="submit">Supprimer</button>
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