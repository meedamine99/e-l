
@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('leçon.store')}}" method="POST">
      @csrf
                 <div class="mb-3">
        <a class="link" href="{{route('matieres.index')}}"><i class="fa-solid fa-arrow-left"></i> back</a>
      </div>
  <div class="mb-3"> 
    <label class="form-label" for="">select a matiere</label>
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
    <button class="btn btn-primary button-43" type="submit">create</button>
  </div>
</form>
</div>
@endsection