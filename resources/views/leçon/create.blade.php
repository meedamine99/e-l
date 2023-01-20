
@extends('layouts.app')
@section('content')
<div class="container">
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
                 <div class="mb-3">
        <a class="link" href="{{route('matieres.index')}}"><i class="fa-solid fa-arrow-left"></i> back</a>
      </div>
  <div class="mb-3"> 
    <label class="form-label" for="">select a matiere</label>
    <select class="form-select" name="matieres_id" id="">
      @foreach ($matieres as $matiere)
        <option value="{{ $matiere->id }}">{{$matiere->nom_matieres}}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label" for="">nom</label>
    <input class="form-control" type="text" name="nom_matiere" id="">
  </div>
  <div class="mb-3">
    <button class="btn btn-primary" type="submit">create</button>
  </div>
</form>
</div>
@endsection