@extends('layouts.app')
@section('content')

@vite(['resources/js/select.js',])
    hi {{$userName}}
    
    <form action=" {{route('access.create')}} " enctype="multipart/form-data">
        <input type="hidden" name="user_id" value=" {{$user}} ">
        <select name="" id="formation" >
            <option value=""></option>
            @foreach($formations as $formation)
                <option value=" {{$formation->id}} ">{{$formation->nom_formation}}</option>
            @endforeach
        </select> 
        
        @foreach($matieres as $matiere)
            
            <div class="matiere" data-matiere="{{$matiere->formation->id}}">
                <label for=""> {{$matiere->nom_matiere}} </label>
                <input type="checkbox" name="matiere[]" id="" value=" {{$matiere->id}} ">
            </div>
        @endforeach
        <button type="submit">add</button>
    </form>

@endsection