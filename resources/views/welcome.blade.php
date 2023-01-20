@extends('layouts.welcome')
@section('content')
    

        <main>
            <section class="hero" id="hero">
                <div>
                    <h1 class="">
                        DON'T JUST WATCH <br />
                        START LEARNING NOW
                    </h1>
                    <div class="image">
                        @auth
                            <a style="text-decoration: none" href="{{ url('/home') }}"><button class="links custom-btn btn-5"><span>begin now</span></button></a>
                            @else
                            @if (Route::has('register'))
                            <a style="text-decoration: none" href="{{ route('register') }}"><button class="links custom-btn btn-5"><span>begin now</span></button></a>
                        @endif
                        @endauth
                        <div class="bg1"></div>
                    </div>
                </div>
            </section>
            <section class="about" id="about">
                <h2>get to know us</h2>
                <div class="about-container">
                    <div class="about-card ">
                        <div class="about-image about-image1 "></div>
                        <div class="about-info ">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Officiis molestias iste nesciunt, dicta
                            excepturi tempora sit doloremque? Magni praesentium
                            dolore asperiores recusandae esse deleniti doloribus
                            totam sed. Repudiandae tempore vitae voluptatem
                            magnam voluptatibus magni quae suscipit
                            consequuntur, nesciunt obcaecati sequi officia
                            perferendis ex blanditiis voluptate ab. Itaque
                            molestiae earum nostrum.
                        </div>
                    </div>
                    <div class="about-card">
                        <div class="about-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Officiis molestias iste nesciunt, dicta
                            excepturi tempora sit doloremque? Magni praesentium
                            dolore asperiores recusandae esse deleniti doloribus
                            totam sed. Repudiandae tempore vitae voluptatem
                            magnam voluptatibus magni quae suscipit
                            consequuntur, nesciunt obcaecati sequi officia
                            perferendis ex blanditiis voluptate ab. Itaque
                            molestiae earum nostrum.
                        </div>
                        <div class="about-image about-image2"></div>
                    </div>
                    <div class="about-card">
                        <div class="about-image about-image3"></div>
                        <div class="about-info">
                            Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Officiis molestias iste nesciunt, dicta
                            excepturi tempora sit doloremque? Magni praesentium
                            dolore asperiores recusandae esse deleniti doloribus
                            totam sed. Repudiandae tempore vitae voluptatem
                            magnam voluptatibus magni quae suscipit
                            consequuntur, nesciunt obcaecati sequi officia
                            perferendis ex blanditiis voluptate ab. Itaque
                            molestiae earum nostrum.
                        </div>
                    </div>
                </div>
            </section>
            <section class="service" id="service">
                <h2>the services we provide</h2>
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
                                    <li>office</li>
                                    <li>html</li>
                                    <li>css</li>
                                    <li>js</li>
                                    <li>wordpress</li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-card">
                            <div class="service-image service-image2"></div>
                            <div class="service-info">
                                <h3>informatique</h3>
                                <ul>
                                    <li>office</li>
                                    <li>html</li>
                                    <li>css</li>
                                    <li>js</li>
                                    <li>wordpress</li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-card">
                            <div class="service-image service-image3"></div>
                            <div class="service-info">
                                <h3>informatique</h3>
                                <ul>
                                    <li>office</li>
                                    <li>html</li>
                                    <li>css</li>
                                    <li>js</li>
                                    <li>wordpress</li>
                                </ul>
                            </div>
                        </div>
                        <div class="service-card">
                            <div class="service-image service-image4"></div>
                            <div class="service-info">
                                <h3>informatique</h3>
                                <ul>
                                    <li>office</li>
                                    <li>html</li>
                                    <li>css</li>
                                    <li>js</li>
                                    <li>wordpress</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="contact" class="contact">
                <h2>contact us</h2>
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
                        <button class="links"><span>send</span></button>
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