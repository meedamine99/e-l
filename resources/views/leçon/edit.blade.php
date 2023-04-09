
@extends('layouts.app')
@section('content')
 @vite(['resources/js/select.js'])
<div class="container">
  <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
  <h2>Modifier une leçon</h2>

<form action="{{ route('leçon.update' , $leçon->id)}}" method="POST">
      @csrf
      @method('PUT')
                 <div class="mb-3">
      </div> 
  <div class="mb-3">
                <label for="">formation</label>
                <select name="" id="formation" class=" @error('formation') is-invalid @enderror form-select ">
                    <option value=""></option>
                    @foreach ($formations as $formation)
                        <option value=" {{$formation->id}} ">{{$formation->nom_formation}}</option>
                    @endforeach
                </select>
                @error('formation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div  class="mb-3">
                <label for="">matiere</label>
                <select name="matiere_id" id="" class=" @error('matiere') is-invalid @enderror form-select ">
                    <option value=""></option>
                    @foreach ($matieres as $matiere)
                        <div >
                            <option class="matiere" data-matiere="{{$matiere->formation->id}}" value=" {{$matiere->id}} ">{{$matiere->nom_matiere}}</option>
                        </div>
                    @endforeach
                </select>
                @error('matiere')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
  <div class="mb-3">
    <label class="form-label" for="">nom</label>
    <input class="form-control @error('nom') is-invalid @enderror " type="text" name="nom" id="" value=" {{$leçon->nom}} ">
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