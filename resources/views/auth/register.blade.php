@extends('layouts.welcome')

@section('content')
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<section class="register">
<div class="container-fluid ">
    <div class="row">
        <div class=" text-black">
            <div class="d-flex align-items-center  gap-5 ">
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;" src=" {{url("/images/bg.jpg")}} " alt="">  
                </div>
        
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
        
        
                                <div class="row mb-3">
                                    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>
                                <div class="row">
                                <div  class="col-md-4">
                                        <label for="nom" class="col-form-label">{{ __('nom') }}</label>
                                    <div class="col-md-16">
                                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="name" autofocus placeholder="entrer votre nom">
        
                                        @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                     </div>
                                </div>
                                
                                <div class="col-md-6 mb-4">
                                        <label for="prenom" class="col-form-label text-md-end">{{ __('prenom') }}</label>
            
                                        <div class="col-md-16">
                                            <input id="prenom" type="text" class="form-control @error('nom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prename" autofocus placeholder="entrer votre prénom">
            
                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4">
                                    <label for="ville" class="col-form-label text-md-end">{{ __('ville') }}</label>
        
                                    <div class="col-md-16">
                                        <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="name" autofocus placeholder="entrer votre ville">
        
                                        @error('ville')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="adresse" class=" col-form-label text-md-end">{{ __('adresse') }}</label>
        
                                    <div class="col-md-16">
                                        <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="name" autofocus placeholder="entrer votre adresse">
        
                                        @error('adresse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                                <div class="form-outline ">
                                    <label for="CIN" class="col-form-label text-md-end">{{ __('CIN') }}</label>
        
                                    <div class="col-md-10">
                                        <input id="CIN" type="text" class="form-control  @error('CIN') is-invalid @enderror" name="CIN" value="{{ old('CIN') }}" required autocomplete="name" autofocus placeholder="entrer votre CIN">
        
                                        @error('CIN')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-outline">
                                    <label for="telephone" class="col-form-label text-md-end">{{ __('telephone') }}</label>
        
                                    <div class="col-md-10">
                                        <input id="telephone" type="text" class="form-control  @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="name" autofocus placeholder="entrer votre telephone">
        
                                        @error('telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-outline mb-6">
                                    <label for="email" class=" col-form-label text-md-end">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-10">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="entrer votre email">
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-outline">
                                    <label for="password" class=" col-form-label text-md-end">{{ __('Password') }}</label>
        
                                    <div class="col-md-10">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="entrer votre password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div cclass="form-outline">
                                    <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>
        
                                    <div class="col-md-10">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="la confirmation du password">
                                    </div>
                                </div>
        
                                <div class="row mt-3 ">
                                    <div class=" col-md-10">
                                        <button type="submit" class="btn btn-info btn-lg btn-block w-100">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
        
                                </div>
                            </form>
                        </div>
                        </div>
            </div>
            
        </div>
        
        </div>
    </div>
</div>
</section>

@endsection
