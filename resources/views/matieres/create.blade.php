@extends('layouts.app')
@section('content')
<form action="{{ route('matieres.store')}}" method="POST">
    @if ( $errors->any() )
                  <div class="pb-0 alert alert-danger">
                      <ul>
                          @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
      @csrf
                 <div >
        <a class="link" href="{{route('matieres.index')}}"><i class="fa-solid fa-arrow-left"></i> back</a>
      </div>
  <div > 
    <label for="">select a formation</label>
    <select name="formation_id" id="">
      @foreach ($formations as $formation)
        <option value="{{ $formation->id }}">{{$formation->nom_formation}}</option>
      @endforeach
    </select>
  </div>
  <div >
    <label for="">nom</label>
    <input type="text" name="" id="">
  </div>
  <div >
    <button type="submit">create</button>
  </div>
</form>

@endsection