@extends('layouts.app')
@section('content')
     @vite(['resources/js/selectOptions.js'])
    @vite(['resources/js/select.js'])
    <form action=" {{route('adminTimeTable.update', $adminTimeTable->id)}} " method="POST">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div>
            
            <label for="">formateur</label>
            <select name="user_id" id="" class=" @error('user_id') is-invalid @enderror">
                
                @foreach ($formateurs as $formateur)
                    <option value=" {{$formateur->id}}">{{$formateur->nom}} {{$formateur->prenom}}</option>  
                @endforeach
            </select>
            @error('user_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
            
            
            <div>
                <label for="">heure debut</label>
                <select name="heur_start" id="hourStart"  style="width:150px;" class=" @error('heur_debut') is-invalid @enderror">
                
                </select>
                @error('heur_start')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
            
            <div>
                <label for="">heure fin</label>
                <select name="heur_end" id="hourEnd" class=" @error('heur_end') is-invalid @enderror">
                
                </select>
                @error('heur_end')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            
            <div>
                <label for="">formation</label>
                <select name="" id="formation" class=" @error('formation') is-invalid @enderror">
                
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
            
            <div>
                <label for="">matiere</label>
                <select name="matiere_id" id="" class=" @error('matiere_id') is-invalid @enderror">
                
                    @foreach ($matieres as $matiere)
                        <div >
                            <option class="matiere" data-matiere="{{$matiere->formation->id}}" value=" {{$matiere->id}} ">{{$matiere->nom_matiere}}</option>
                        </div>
                    @endforeach
                </select>
                @error('matiere_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            
            <div>
                <label for="">jour</label>
                <select name="day" id="" class=" @error('day') is-invalid @enderror">
                
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
        <div><button type="submit">ajouter</button></div>   
    </div>
    
</form>
</div>
<script>
    const formationSelect = document.getElementById('formation');
    const selectMatiere = document.querySelectorAll('.matiere');
</script>
@endsection