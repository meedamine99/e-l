@extends('layouts.app')
@section('content')
<a href="{{route('matieres.index')}}"></a>




<div class="container">
    <input type="hidden" name="_method" value="put">
        <div>
            <label for="" class="form-label">nom_matiere</label>
            <input type="text" class="form-control" name="nom_matiere">
        </div>
</div>
    
    @endsection