@extends('layouts.app')
@section('content')
<div class="container">
  <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
  <h2>Modifier une matiere</h2>
<form action="{{ route('matieres.update' , $matiere->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')

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
      </div>
  <div class="mb-3"> 
    <label class="form-label" for="">séléctionner une formation</label>
    <select  name="formation_id" id="" class="form-select @error('formation_id') is-invalid @enderror">
          <option value=""></option>
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
    <input value=" {{$matiere->nom_matiere}} " type="text" name="nom_matiere" id="" class="form-control @error('nom_matiere') is-invalid @enderror">
    @error('nom_matiere')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">matiere pdf preview</label>
    <input type="file" class="" name="preview" id="" value="">
  </div>
  <div class="mb-3">
    <button class="btn btn-primary button-43" type="submit">Modifier</button>
  </div>
</form>
</div>
@endsection