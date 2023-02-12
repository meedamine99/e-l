@extends('layouts.welcome')
@section('content')
@vite(['resources/css/preview.css'])
<a class="back" href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
    <div class="con">
        <div>
            <h1>La matiere {{$matiere->nom_matiere}} de la formation {{$matiere->formation->nom_formation}} </h1>
        </div>
        <div>
            <iframe class="preview" src=" {{url('matiere_previews/' . $matiere->path . '#toolbar=0')}} " frameborder="0"></iframe>
        </div>
    </div>
@endsection