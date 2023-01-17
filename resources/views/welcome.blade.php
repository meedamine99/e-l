<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>e-learning</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

        <!-- Styles -->
        {{-- <style>
            ! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.csshtml{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style> --}}
        @vite([ 'resources/css/app.css','resources/js/app.js'])
        <style>
            body {
                font-family:  sans-serif;
            }
        </style>
    </head>
    <body>


        <div class="container">
        <div class="preloader"></div>
    </div>
    <div id="page">
        <div class="shine"></div>
        
            <nav class="navMenu">
                <a href="#hero">
                    <div class="logo links">
                        <div class="closed-sq c1"></div>
                        <div class="opened-sq o1"></div>
                        <div class="opened-sq o2"></div>
                        <div class="closed-sq c2"></div>
                    </div>
                </a>
                <div>
                    <a class="links" href="#hero">Home</a>
                    <a class="links" href="#about">about</a>
                    <a class="links" href="#service">services</a>
                    <a class="links" href="#contact">contact</a>
                </div>
                <div class="">
                    @if (Route::has('login'))
                        <div >
                            @auth
                                <a class="links auth" href="{{ url('/home') }}">dashboard</a>
                            @else
                                <a class="links auth" href="{{ route('login') }}">Log in</a>
            
                                @if (Route::has('register'))
                                    <a class="links auth" href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                    
                </div>
            </nav>
            
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
    </body>
</html>
