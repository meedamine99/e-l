@extends('layouts.app')
@section('content')
<div class="container">
   <a href="{{ url()->previous() }}" ><i class="fa-solid fa-left-long"></i></a>
   <h2>Uploader un PDF</h2>
                  @if ($message = Session::get('success'))
                      <div class="alert alert-success alert-block">
                         <button type="button" class="close" data-dismiss="alert">×</button>
                         <strong>{{ $message }}</strong>
                      </div>
                  @endif
                  <form action="{{ route('pdfs.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                  
                           <div class="mb-3">
                              <label class="form-label">leçon:</label>
                              <select name="leçon_id" id="" class="form-select @error('leçon_id') is-invalid @enderror">
                                   @foreach($leçons as $leçon )
                                       <option value="{{$leçon->id}}">{{$leçon->nom}}</option>
                                   @endforeach
                              </select>
                              @error('leçon_id')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <label class="form-label">titre :</label>
                              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"/>
                              @error('title')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                 </span>
                              @enderror
                           </div>
                           <div class="mb-3">
                              <label class="form-label">Séléctionner PDF:</label>
                              <input type="file" name="pdf" class="form-control @error('pdf') is-invalid @enderror"/>
                              @error('pdf')
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