@extends('layouts.app')
@section('content')
<div class="container">
    {{-- @vite(['resources/js/selectOptions.js']) --}}
    <form action=" {{route('dateday.store')}} ">
        <div>
            <script src="http://[::1]:5174/resources/js/selectOptions.js" type="module" defer>
            </script>
            <label for="">formateur</label>
            <select name="" id="" >
                <option value=""></option>
            </select>
        
            
            
            <label for="">heure debut</label>
            <select name="" id="hourStart"  style="width:150px;">
                <option value=""></option>
            </select>
            
        
            
            <label for="">heure fin</label>
            <select name="" id="hourEnd" >
                <option value=""></option>
            </select>
            
            
            
            <label for="">formation</label>
            <select name="" id="" >
                <option value=""></option>
            </select>
            
            
            <label for="">matiere</label>
            <select name="" id="" >
                <option value=""></option>
            </select>
            
            
            
            <label for="">jour</label>
            <select name="" id="" >
                <option value=""></option>
            </select>
        <button type="submit">ajouter</button>
    </div>
    
</form>
</div>
@endsection