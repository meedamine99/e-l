@extends('layouts.app')
@section('content')

@vite(['resources/js/select.js',])
    <div class="container">
    <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
        <h2>Donner access à {{$userName}}</h2>
        
        <form action=" {{route('access.create')}} " enctype="multipart/form-data">
            <input type="hidden" name="user_id" value=" {{$user}} ">
            <div class="mb-3">
                <label for="formation">les formations :</label>
                <select class="form-select" name="" id="formation" >
                    <option value=""></option>
                    @foreach($formations as $formation)
                        <option value=" {{$formation->id}} ">{{$formation->nom_formation}}</option>
                    @endforeach
                </select>
            </div>
        
            @foreach($matieres as $matiere)
        
                <div class="matiere mb-3" data-matiere="{{$matiere->formation->id}}">
                    <label for="" class="form-check-label"> {{$matiere->nom_matiere}} </label>
                    <input class="form-check-input" type="checkbox" name="matiere[]" id="" value=" {{$matiere->id}} ">
                </div>
            @endforeach
            <div><button type="submit" class="btn btn-primary button-43">add</button></div>
        </form>
    </div>

@endsection