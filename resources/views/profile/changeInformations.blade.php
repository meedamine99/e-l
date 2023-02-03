@extends('layouts.app')
@section('content') 

              <div class="card-header">{{ __('Profile Information') }}</div>
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
                  {{ __("Update your account's profile information and email address.") }}
                </p>
                <form class="actions" action="{{route('profile.update_informations', auth()->id())}}" method="post">
                  
                    @csrf
                    <input type="hidden" name="_method" value="put">

                    <div class="mb-3">
                      <label for="" >nom</label>
                      <input type="text" name="nom"  id="" placeholder="nom" value="{{auth()->user()->nom}}">
                    </div>
                    @error('nom')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="mb-3">
                      <label for="" >prenom</label>
                      <input type="text" name="prenom"  id="" placeholder="prenom" value="{{auth()->user()->prenom}}">
                    </div>
                    @error('prenom')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror

                    
                    <div class="mb-3">
                      <label for="" >password</label>
                      <input type="password" name="password"  id="" placeholder="password">
                      @error('password')
                        <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>

                    <div>
                      <button type="submit"><i class="fa-solid fa-pen"></i> save</button>
                    </div>
                  </form>
                




    
@endsection