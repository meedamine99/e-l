@extends('layouts.welcome')

@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<section class="login">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-6 text-black">
                <div class="px-5 ms-xl-4">
                </div>
                    <div class="d-flex align-items-center h-custom-2 ">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            
                            <div class="row mb-3">  
                                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
                                
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example18">Adresse Email :</label>
                                    <input type="email" id="form2Example18" class="form-control form-control-lg" placeholder="entrer votre email" />
                                    
                                </div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="form2Example28">Mot de passe :</label>
                                <input type="password" id="form2Example28" class="form-control form-control-lg" placeholder="entrer votre mot de passe"/>
                                
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
                                <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                            </div>
                            
                            <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                
                            </div>
                            
                        </form>
        
                    </div>

            

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;" src=" {{url("/images/bg.jpg")}} " alt="">  
                </div>
            </div>
            
        </div>
    </div>
    
</section>

</div>
@endsection
