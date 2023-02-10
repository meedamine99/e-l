@extends('layouts.app')
@section('content') 
<div class="container">
                <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
                <h2>{{ __('Profile Information') }}</h2>
                  @if ( $errors->any() )
                                    <div class="pb-0 alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
  
  
                  <p>
                    {{ __("Update your account's profile information.") }}
                  </p>
                  <form class="actions" action="{{route('profile.update_informations', auth()->id())}}" method="post">
  
                      @csrf
                      <input type="hidden" name="_method" value="put">
  
                      <div class="mb-3">
                        <label for="" >Nom</label>
                        <input class="form-control" type="text" name="nom"  id="" placeholder="nom" value="{{auth()->user()->nom}}">
                      </div>
                      @error('nom')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
  
                      <div class="mb-3">
                        <label for="" >Prenom</label>
                        <input  class="form-control" type="text" name="prenom"  id="" placeholder="prenom" value="{{auth()->user()->prenom}}">
                      </div>
                      @error('prenom')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
  
                      <div class="mb-3">
                        <label for="" >Ville</label>
                        <input  class="form-control" type="text" name="ville"  id="" placeholder="ville" value="{{auth()->user()->ville}}">
                      </div>
                      @error('ville')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
  
                      <div class="mb-3">
                        <label for="" >Addresse</label>
                        <input  class="form-control" type="text" name="adresse"  id="" placeholder="address" value="{{auth()->user()->adresse}}">
                      </div>
                      @error('address')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
  
                      <div class="mb-3">
                        <label for="" >CIN</label>
                        <input  class="form-control" type="text" name="CIN"  id="" placeholder="cin" value="{{auth()->user()->CIN}}">
                      </div>
                      @error('cin')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
  
                      <div class="mb-3">
                        <label for="" >Telephone</label>
                        <input  class="form-control" type="text" name="telephone"  id="" placeholder="telephone" value="{{auth()->user()->telephone}}">
                      </div>
                      @error('telephone')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
  
  
                      <div class="mb-3">
                        <label for="" >Password</label>
                        <input  class="form-control" type="password" name="password"  id="" placeholder="password">
                        @error('password')
                          <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
  
                      <div>
                        <button class="btn btn-primary button-43" type="submit"><i></i> Sauvgarder</button>
                      </div>
                    </form>
  
  
  
  
</div>

    
@endsection