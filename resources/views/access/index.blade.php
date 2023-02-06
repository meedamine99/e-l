@extends('layouts.app')
@section('content')

@vite(['resources/js/select.js',])
    <div class="container">
        <h1>Donner access à {{$userName}}</h1>
        
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
            <div><button type="submit">add</button></div>
        </form>
    </div>

@endsection