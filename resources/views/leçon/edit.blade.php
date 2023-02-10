
@extends('layouts.app')
@section('content')
<div class="container">
  <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
  <h2>Modifier une leçon</h2>

<form action="{{ route('leçon.update' , $leçon->id)}}" method="POST">
      @csrf
                 <div class="mb-3">
      </div>
  <div class="mb-3"> 
    <label class="form-label" for="">séléctionner une matière</label>
    <select class="form-select @error('matiere_id') is-invalid @enderror" name="matiere_id" id="">
      @foreach ($matieres as $matiere)
        <option value="{{ $matiere->id }}">{{$matiere->nom_matiere}}</option>
      @endforeach
    </select>
    @error('matiere_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label" for="">nom</label>
    <input class="form-control @error('nom') is-invalid @enderror " type="text" name="nom" id="">
    @error('nom')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <button class="btn btn-primary button-43" type="submit">Modifier</button>
  </div>
</form>
</div>
@endsection