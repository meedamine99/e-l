@extends('layouts.app')

@section('content')
<div class="container">
                    @if($message = Session::get('success'))
                        <div>
                            <p class="alert alert-success">{{$message}}</p>
                        </div>
                    @endif

                    <div class=" popup d-flex justify-content-around align-items-center">
                        <div>
                            <h1>{{ Auth::user()->nom }}!</h1>
                            <p>Il est bon de vous revoir.</p>
                        </div>
                        <div class="hello">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_kkTEN8ht7u.json"  background="transparent"  speed="1"  style=" width:200px height: 200px;"  loop autoplay></lottie-player>
                        </div>
                        <div class="user-info">
                            <span>Nom complet :</span> <p>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</p> <br>
                            <span>Role :</span> <p>{{ Auth::user()->role }}</p> <br>
                            <span>Email :</span> <p>{{ Auth::user()->email }}</p> <br>
                            <span>Telephone :</span> <p>{{ Auth::user()->telephone }}</p> <br>
                            <span>CIN :</span> <p>{{ Auth::user()->CIN }}</p> <br>
                            <span>Ville :</span> <p>{{ Auth::user()->ville }}</p> <br>
                            <span>Adresse :</span> <p>{{ Auth::user()->adresse }} </p> <br>
                        </div>
                    </div>
                    <div class="les_card">
                        <h2>Mes cours</h2>
                        @if($matieres->count() > 0)
                        @foreach ($matieres as $matiere)
                        
                            <div class="une_card">
                                <a class="" href="{{ route('lecon.index', ['matiere' => $matiere->id, 'nom_matiere' => $matiere->nom_matiere]) }}">{{ $matiere->nom_matiere }}</a>
                            {{-- <div>
                                {{ $matiere->formation->nom_formation }}
                            </div> --}}
                            <div>
                                <a class="btn btn-primary button-43" href="{{ route('lecon.index', ['matiere' => $matiere->id, 'nom_matiere' => $matiere->nom_matiere]) }}">les leçons</a>
                            </div>

                    
                        </div>
                        
                        @endforeach
                        @else
                            <p class="text-center alert alert-danger">Aucun cours</p>
                        @endif
                    </div>
               
</div>
@endsection
