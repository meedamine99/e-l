@extends('layouts.app')
@section('content')
<div class="container">
    <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
    <h2>Modifier La formation {{$formation->nom_formation}} </h2>
            <form  action="{{ route('formation.update', $formation->id)}}" method="POST" enctype="multipart/form-data">
              @method('POST')
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
          </div>
    <input type="hidden" name="_method" value="put">
      <div class="mb-3">
        <label for="" class="form-label">nom</label>
        <input type="text" class="form-control" name="nom_formation" id="" value="{{$formation->nom_formation}}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">date de début</label>
        <input type="date" class="form-control" name="date_début" id="" value="{{$formation->date_début}}">
      </div>
      <div  class="mb-3">
        <label for="" class="form-label">date de fin</label>
        <input type="date" class="form-control" name="date_fin" id="" value="{{$formation->date_fin}}">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">formation image</label>
        <input type="file" class="" name="image" id="" value="">
      </div>
      <div class="mb-3">
          <label for="" class="form-label">type</label>
          <select name="type" id="" class="form-select @error('type') is-invalid @enderror">
            <option value="présentiel">présentiel</option>
            <option value="a distance">a distance</option>
            <option value="les deux">les deux</option>
          </select>
          @error('type')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>
      <div  class="mb-3">
        <button class="btn btn-primary button-43" type="submit">edit</button>
      </div>
    </form>
</div>
@endsection