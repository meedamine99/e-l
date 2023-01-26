@extends('layouts.welcome')
@section('content')
    

        <main>
            <section class="hero" id="hero">
                <div>
                    <h1 class="">
                        JE NE PERDS JAMAIS  <br />
                        <h3>SOIT JE GAGNE SOIT J’APPRENDS</h3>
                    </h1>
                    <div class="image">
                        @auth
                            <a style="text-decoration: none" href="{{ url('/home') }}"><button class="links custom-btn btn-5"><span>registre</span></button></a>
                            @else
                            @if (Route::has('register'))
                            <a style="text-decoration: none" href="{{ route('register') }}"><button class="links custom-btn btn-5"><span>registre</span></button></a>
                        @endif
                        @endauth
                        <div class="bg1"></div>
                    </div>
                </div>
            </section>
            <section class="about" id="about">
                <h2>APPRENDRE A NOUS CONNAITRE</h2>
                <div class="about-container">
                    <div class="about-card ">
                        <div class="about-image about-image1 "><div class="before"></div></div>
                        <div class="about-info ">
                            Bel Learning Pro est un cabinet qui œuvre dans les domaines d’entreprenariat,d’Economie Solidaire, de Gestion, de Marketing, de Formation et de Management au profit des sociétés privées, des coopératives et associations, des particuliersainsi que des administrations publiques.
                        </div>
                    </div>
                    <div class="about-card">
                        <div class="about-info">
                            Le cabinet dispose également de plusieurs plateformes personnalisées d’enseignement à distance sans oublier que chaque bénéficiaire aura son propre espace sur la plateforme choisie selon le thème de formation.
                        </div>
                        <div class="about-image about-image2"><div class="before"></div></div>
                    </div>
                    <div class="about-card">
                        <div class="about-image about-image3"><div class="before"></div></div>
                        <div class="about-info">
                            Notre cabinet offre des formations de soutien pour tous les niveaux, les séances sont enregistrées dans des moocs et consultables à tout moment.
                        </div>
                    </div>
                </div>
            </section>
            <section class="service" id="service">
                <h2>LES SERVICES QUE NOUS OFFRONS</h2>
                <div>
                    <div class="btns">
                        <div class="pre-btn links"></div>
                        <div class="nxt-btn links"></div>
                    </div>
                    <div class="service-container">
                        <div class="service-card">
                            <div class="service-image service-image1">
                                <!-- <img src="bg2.jpg" alt=""> -->
                            </div>
                            <div class="service-info">
                                <h3>informatique</h3>
                                <ul>
                                    <li><a href=""> office </a></li>
                                    <li><a href=""> html </a></li>
                                    <li><a href=""> css </a></li>
                                    <li><a href=""> js </a></li>
                                    <li><a href=""> wordpress </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-card">
                            <div class="service-image service-image2"></div>
                            <div class="service-info">
                                <h3>informatique</h3>
                                <ul>
                                    <li><a href=""> office </a></li>
                                    <li><a href=""> html </a></li>
                                    <li><a href=""> css </a></li>
                                    <li><a href=""> js </a></li>
                                    <li><a href=""> wordpress </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-card">
                            <div class="service-image service-image3"></div>
                            <div class="service-info">
                                <h3>informatique</h3>
                                <ul>
                                    <li><a href=""> office </a></li>
                                    <li><a href=""> html </a></li>
                                    <li><a href=""> css </a></li>
                                    <li><a href=""> js </a></li>
                                    <li><a href=""> wordpress </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-card">
                            <div class="service-image service-image4"></div>
                            <div class="service-info">
                                <h3>informatique</h3>
                                <ul>
                                    <li><a href=""> office </a></li>
                                    <li><a href=""> html </a></li>
                                    <li><a href=""> css </a></li>
                                    <li><a href=""> js </a></li>
                                    <li><a href=""> wordpress </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="contact" class="contact">
                <h2>contactez-nous</h2>
                <div class="contact-form">
                    <div class="icons">
                        
                            <a class="links contact-links" target="_blank" href="mailto:bellearningpro@gmail.com"><i class="bi bi-envelope"></i></a>
                            <a class="links contact-links" target="_blank" href="https://api.whatsapp.com/send?phone=2120668762170"><i class="bi bi-whatsapp"></i></a>
                            <a class="links contact-links" target="_blank" href="https://www.instagram.com/bellearningpro/"><i class="bi bi-instagram"></i></a>
                            <a class="links contact-links" target="_blank" href="https://www.facebook.com/BellearningPro"><i class="bi bi-facebook"></i></a>
                            <a class="links contact-links" target="_blank" href="https://www.google.com/maps/place/Bel+Learning+Pro/@34.684458,-1.916194,19z/data=!4m12!1m6!3m5!1s0x0:0xe87db6d5a82d5143!2sBel+Learning+Pro!8m2!3d34.6844619!4d-1.9161925!3m4!1s0x0:0xe87db6d5a82d5143!8m2!3d34.6844619!4d-1.9161925?hl=en-GB"><i class="bi bi-geo-alt"></i></a>
                        
                    </div>
                    <form action="">
                        <label class="float-label">
                            <input class="input" placeholder=" " type="text" required="required">
                            <span class="label">nom</span>
                        </label>
                        <label class="float-label">
                            <input class="input" placeholder=" " type="email" required="required">
                            <span class="label">Email</span>
                        </label>
                        <label class="float-label">
                            <textarea class="input" name="" id="" cols="30" rows="4"></textarea>
                            <span class="label">massage</span>
                        </label>
                        <button class="links"><span>envoyer</span></button>
                    </form>
                </div>
            </section>
        </main>
        <footer>
            <div class="footer">
                <div class="contact-info">
                    <ul>
                        <h4>contact informations</h4>
                        <li><strong>adress</strong> : Rue Ibn rochd residence Rania <br>
                             4eme etage appt 16, OUJDA</li>
                        <li><strong>e-mail </strong>: bellearningpro@gmail.com</li>
                        <li><strong>telephone </strong>: 06 68 76 21 70 - 07 67 19 55 88</li>
                    </ul>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="#hero"> home </a></li>
                    </ul>
                </div>
                <div class="bel">
                    <img src="images/belpro-noir logo.png" alt="">
                </div>
            </div>
        <p>
            <strong>copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                .
            </strong>
            all rights reserved, Bel Learning Pro
        </p>
    </footer>
    </div>
@endsection