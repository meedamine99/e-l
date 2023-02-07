@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{ route('matieres.store')}}" method="POST">
      @csrf
                 <div class="mb-3">
        <a class="link" href="{{route('matieres.index')}}"><i class="fa-solid fa-arrow-left"></i> back</a>
      </div>
  <div class="mb-3"> 
    <label class="form-label" for="">select a formation</label>
    <select  name="formation_id" id="" class="form-select @error('formation_id') is-invalid @enderror">
      @foreach ($formations as $formation)
        <option value="{{ $formation->id }}">{{$formation->nom_formation}}</option>
      @endforeach
    </select>
    @error('formation_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label class="form-label" for="">nom</label>
    <input type="text" name="nom_matiere" id="" class="form-control @error('nom_matiere') is-invalid @enderror">
    @error('nom_matiere')
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