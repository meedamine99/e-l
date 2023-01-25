@extends('layouts.app')
@section('content')
<div class="container">
    @vite(['resources/js/selectOptions.js'])
    @vite(['resources/js/select.js'])
    <form action=" {{route('adminTimeTable.store')}} " method="POST">
        @csrf
        <div>
            
            <label for="">formateur</label>
            <select name="formateur" id="" >
                <option value=""></option>
                @foreach ($formateurs as $formateur)
                    <option value=" {{$formateur->id}}">{{$formateur->nom}} {{$formateur->prenom}}</option>  
                @endforeach
            </select>
        
            
            
            <label for="">heure debut</label>
            <select name="heur_start" id="hourStart"  style="width:150px;">
                <option value=""></option>
            </select>
            
        
            
            <label for="">heure fin</label>
            <select name="heur_end" id="hourEnd" >
                <option value=""></option>
            </select>
            
            
            
            <label for="">formation</label>
            <select name="" id="formation" >
                <option value=""></option>
                @foreach ($formations as $formation)
                    <option value=" {{$formation->id}} ">{{$formation->nom_formation}}</option>
                @endforeach
            </select>
            
            
            <label for="">matiere</label>
            <select name="matiere" id="" >
                <option value=""></option>
                @foreach ($matieres as $matiere)
                    <div >
                        <option class="matiere" data-matiere="{{$matiere->formation->id}}" value=" {{$matiere->id}} ">{{$matiere->nom_matiere}}</option>
                    </div>
                @endforeach
            </select>
            
            
            
            <label for="">jour</label>
            <select name="day" id="" >
                <option value=""></option>
                <option value="lundi">lundi</option>
                <option value="mardi">mardi</option>
                <option value="mercredi">mercredi</option>
                <option value="jeudi">jeudi</option>
                <option value="vendredi">vendredi</option>
                <option value="samedi">samedi</option>
                <option value="dimanch">dimanch</option>
            </select>
        <button type="submit">ajouter</button>
    </div>
    
</form>
</div>
<script>
    const formationSelect = document.getElementById('formation');
    const selectMatiere = document.querySelectorAll('.matiere');
</script>

@endsection