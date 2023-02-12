@extends('layouts.app')
@section('content')
                @vite(['resources/js/select.js'])
               <div class="container">
                  <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
                  <h2>Uploader un vidéo</h2>
                  @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block">
                         <button type="button" class="close" data-dismiss="alert">×</button>
                         <strong>{{ $message }}</strong>
                      </div>
                  @endif
                  <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                           <div class="mb-3">
                              <label for="">formation</label>
                              <select name="" id="formation" class=" @error('formation') is-invalid @enderror form-select ">
                                 <option value=""></option>
                                 @foreach ($formations as $formation)
                                       <option value=" {{$formation->id}} ">{{$formation->nom_formation}}</option>
                                 @endforeach
                              </select>
                              @error('formation')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           
                           <div  class="mb-3">
                              <label for="">matiere</label>
                              <select name="matiere" id="matiere" class=" @error('matiere') is-invalid @enderror form-select ">
                                 <option value=""></option>
                                 @foreach ($matieres as $matiere)
                                       <div >
                                          <option class="matiere" data-matiere="{{$matiere->formation->id}}" value=" {{$matiere->id}} ">{{$matiere->nom_matiere}}</option>
                                       </div>
                                 @endforeach
                              </select>
                              @error('matiere')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <label class="form-label">leçon:</label>
                              <select name="leçon_id" id="" class="form-select @error('leçon_id') is-invalid @enderror"">
                                 <option></option>  
                                    @foreach($leçons as $leçon )
                                       <option class="leçon" data-matiere="{{$leçon->matiere->id}}" value="{{$leçon->id}}">{{$leçon->nom}}</option>
                                    @endforeach
                              </select>
                              @error('leçon_id')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <label class="form-label">Titre:</label>
                              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror""/>
                              @error('title')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <label class="form-label">Select Video:</label>
                              <input type="file" name="video" class="form-control @error('video') is-invalid @enderror""/>
                              @error('video')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <button type="submit" class="btn btn-primary button-43">Ajouter</button>
                           </div>
                  
                  
                  </form>
               </div>
               
@endsection