@extends('layouts.app')
@section('content') 
<div class="container">
              <a href="{{ url()->previous() }}" ><i class="fa-solid fa-left-long"></i></a>
              <h2>{{ __('Profile Information') }}</h2>
              
                
                
                <p>
                  {{ __("Change your password") }}
                </p>
                <form class="actions" action="{{route('profile.update_password', auth()->user()->id)}}" id="change_password_form" method="post">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                        {{ __('Profile Updated') }}
                      </div>
                  @endif
                    @csrf
                    <input class="form-control" type="hidden" name="_method" value="put">

                    <input class="form-control" type="hidden" name="token" value="{{ csrf_token() }}">
                    @if ( $errors->any() )
                              <div class="alert alert-danger pb-0">
                                  <ul>
                                      @foreach($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif  
                    <div class="mb-3">
                      <label for="" >Email</label>
                      <input class="form-control" type="email" name="email"  id="" placeholder="email" value="{{auth()->user()->email}}">
                    </div>
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="mb-3" >
                      <label for="" >Votre mot de passe</label>
                      <input class="form-control" type="password" name="current_password"  id="" placeholder="old password">
                    </div>
                    @error('current_password')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="mb-3">
                      <label for="" >Nouveau mot de passe</label>
                      <input class="form-control" type="password" name="password"  id="" placeholder="new password">
                    </div>
                    @error('password')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="mb-3">
                      <label for="" >Confirmer le mot de passe</label>
                      <input class="form-control" type="password" name="password_confirmation"  id="" placeholder="confirm password">
                      @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div>
                      <button   class="btn btn-primary button-43" type="submit">Sauvgarder</button>
                    </div>
                </form>
                  </div>
                </div>
            </div>
        </div>
      </div>

  </div>


    
@endsection