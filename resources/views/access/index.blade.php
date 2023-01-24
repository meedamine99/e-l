@extends('layouts.app')
@section('content')
<style>
    .active{
        display: block;
    }
    .inactive{
        display: none;
    }
</style>
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
    <script>
        const formationSelect = document.getElementById('formation');
        const checkMatiere = document.querySelectorAll('.matiere');
        function inactive(item){
            item.forEach(e=>{
                e.classList.add("inactive");
            });
        };
        inactive(checkMatiere);
        formationSelect.addEventListener('change', item => {
            inactive(checkMatiere);
            checkMatiere.forEach(e=>{
                if(parseInt(e.dataset.matiere)===parseInt(item.target.value))
                    e.classList.remove("inactive");
            })
        })
    </script>
@endsection