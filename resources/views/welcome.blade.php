@extends('layouts.welcome')
@section('content')
    

            <section class="hero" id="hero">
                <div>
                    <h1 class="titre">
                        JE NE PERDS
                        <span style="color: #24acdc;">JAMAIS</span>  <br />
                        <span id="p">SOIT <span id="spin"></span></span>
                    </h1>
                    <div class="image">
                        @auth
                            <a style="text-decoration: none" href="{{ url('/home') }}"><button class="links my-btn btn-5"><span>registre</span></button></a>
                            @else
                            @if (Route::has('register'))
                            <a style="text-decoration: none" href="{{ route('register') }}"><button class="links my-btn btn-5"><span>registre</span></button></a>
                        @endif
                        @endauth
                        <div class="bg1"></div>
                    </div>
                </div>
            </section>
            {{-- <section class="about" id="about">
                <h2 class="h2-title header">APPRENDRE A NOUS CONNAITRE</h2>
                <div class="about-container">
                    
                </div>
            </section> --}}
            <section class="service" id="service">
                <h2 class="h2-title header">LES SERVICES QUE NOUS OFFRONS</h2>
                <div>
                    <div class="btns">
                        <div class="pre-btn links"><i class="fa-solid fa-chevron-left"></i></div>
                        <div class="nxt-btn links"><i class="fa-solid fa-chevron-right"></i></div>
                    </div>
                    <div class="service-container">
                        @foreach($formations as $formation)
                        <div class="service-card">
                            <div class="service-image">
                                <img src=" {{url('/formation_images/' . $formation->path)}} " alt="">
                            </div>
                            <div class="service-info">
                                <h3> {{$formation->nom_formation}} </h3>
                                <ul>
                                    @foreach($matieres as $matiere)
                                        @if($matiere->formation_id == $formation->id)
                                            <li><a href="{{ route('welcome.preview', $matiere->id) }}"> {{$matiere->nom_matiere}} </a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </section>
            <section id="contact" class="contact">
                <h2 class="h2-title header">contactez-nous</h2>
                <div class="contact-form">
                    <div class="icons">
                        
                            <a class="links contact-links" target="_blank" href="#"><i class="bi bi-envelope"></i></a>
                            <a class="links contact-links" target="_blank" href="#"><i class="bi bi-whatsapp"></i></a>
                            <a class="links contact-links" target="_blank" href="#"><i class="bi bi-instagram"></i></a>
                            <a class="links contact-links" target="_blank" href="#"><i class="bi bi-facebook"></i></a>
                            <a class="links contact-links" target="_blank" href="#"><i class="bi bi-geo-alt"></i></a>
                        
                    </div>

                    <form action=" {{route('contact.submit')}} " method="POST">
                        @csrf
                        <label class="float-label">
                            <input name="name" class="input" placeholder=" Nom " type="text" required="required">

                        </label>
                        <label class="float-label">
                            <input name="email" class="input" placeholder=" E-mail " type="email" required="required">

                        </label>
                        <label class="float-label">
                            <textarea name="content" class="input" placeholder=" Message" cols="30" rows="4" required></textarea>
                            
                        </label>
                        <button class="links" ><span>envoyer</span></button>
                    </form>
                </div>
            </section>
        </main>
        <footer>
            <div class="footer">
            </div>
        <p>
            <strong>copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                .
            </strong>
            all rights reserved
        </p>
    </footer>
    </div>
@endsection