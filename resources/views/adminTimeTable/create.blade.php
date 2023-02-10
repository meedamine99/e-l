@extends('layouts.app')
@section('content')
<div class="container">
    @vite(['resources/js/selectOptions.js'])
    @vite(['resources/js/select.js'])
    <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
    <h2>Créer une session</h2>
    <form action=" {{route('adminTimeTable.store')}} " method="POST">
        @csrf
        <div>
            
            <div class="mb-3">
                <label for="">formateur</label>
                <select name="formateur" id="" class=" @error('formateur') is-invalid @enderror form-select ">
                    <option value=""></option>
                    @foreach ($formateurs as $formateur)
                        <option value=" {{$formateur->id}}">{{$formateur->nom}} {{$formateur->prenom}}</option>
                    @endforeach
                </select>
                @error('formateur')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
            
            
            <div class="mb-3">
                <label for="">heure debut</label>
                <select name="heur_start" id="hourStart"  class=" @error('heur_start') is-invalid @enderror form-select ">
                    <option value=""></option>
                </select>
                @error('heur_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
            
            <div class="mb-3">
                <label for="">heure fin</label>
                <select name="heur_end" id="hourEnd" class=" @error('heur_end') is-invalid @enderror form-select    ">
                    <option value=""></option>
                </select>
                @error('heur_end')
                    <span class="invalid-feedback" role="alert">
                        <strong>The heure fin field is required.</strong>
                    </span>
                @enderror
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
                <select name="matiere" id="" class=" @error('matiere') is-invalid @enderror form-select ">
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
                <label for="">jour</label>
                <select name="day" id="" class=" @error('day') is-invalid @enderror form-select ">
                    <option value=""></option>
                    <option value="lundi">lundi</option>
                    <option value="mardi">mardi</option>
                    <option value="mercredi">mercredi</option>
                    <option value="jeudi">jeudi</option>
                    <option value="vendredi">vendredi</option>
                    <option value="samedi">samedi</option>
                    <option value="dimanch">dimanch</option>
                </select>
                @error('day')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        <div><button type="submit" class="btn btn-brimary button-43">Créer</button></div>
    </div>
    
</form>
</div>
<script>
    const formationSelect = document.getElementById('formation');
    const selectMatiere = document.querySelectorAll('.matiere');
</script>

@endsection