@extends('layouts.welcome')
@section('content')

@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<section class="login">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-6 text-black">
                <div class="d-flex align-items-center h-custom-2 ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                            <div class="row mb-3">  
                                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
                                
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example18">Adresse Email :</label>
                                    <input type="email" id="form2Example18" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="entrer votre email" name="email"/>
                                    
                                </div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example28">Mot de passe :</label>
                                <input type="password" id="form2Example28" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="entrer votre mot de passe" name="password"/>
                                
                            </div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label  class="form-check-label " for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-1 mb-4">
                                <button type="submit" class="btn btn-primary w-100" style="background-color: #24acdc; border: none">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <p>Don't have an account? <a href=" {{route('register')}} " style="color: #24acdc">Register here</a></p>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" style="color: #24acdc" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                            
                                
                                    
                        </form>
                                
                    </div>
                </div>

            

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;" src=" {{url("/images/bg.jpg")}} " alt="">  
                </div>
            </div>
            
        </div>
    
    
</section>


@endsection
