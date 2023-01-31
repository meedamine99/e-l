@extends('layouts.app')
@section('content')



{{--        <form  action="{{url('/search')}}">
  <div style="margin-left: 640px" class="textbox"> 
    <input type="text" name="query" placeholder="search formation" >
  </div> --}}
  <div class="container">
    <h2>les formations</h2>
    @if($message = Session::get('success'))
        <div>
          <p >{{$message}}</p>
        </div>
    @endif
    @if (Auth::user()->role == "admin")
        <a id="create" href="{{route('formation.create')}}"class="text-center d-block">create formation</a>
    @endif
  <table >
    <tr class="">
      <th>nom formation</th>
      <th>date debut</th>
      <th>date fin</th>
      <th>type</th>
      <th>actions</th>
    </tr>
    @foreach ($formation as $formation)
    <tr>
      <td><a class="" href="{{ route('matieres.index', ['formation' => $formation->id]) }}">{{ $formation->nom_formation }}</a></td>
      <td>{{ $formation->date_début }}</td>
      <td>{{ $formation->date_fin }}</td>
      <td>{{ $formation->type }}</td>
      <td>
        @if (Auth::user()->role == "admin")
        <a class="btn btn-primary" href="{{ route('formation.edit', $formation->id) }}">Modifier</a>
        <form style="display: inline-block" action="{{ route('formation.destroy', $formation->id) }}" method="Post">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" onclick="return confirm('do u really want to delete this formation?')" type="submit">Supprimer</button>
        </form>
        @endif
        
        <a class="btn btn-primary" href="{{ route('matieres.index', ['formation' => $formation->id]) }}">les matieres </a>
        
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