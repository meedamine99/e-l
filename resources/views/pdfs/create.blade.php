@extends('layouts.app')
@section('content')
    <!DOCTYPE html>
<html>
   <head>
      <title>Laravel pdf Upload Form</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container mt-5">
         <div class="panel panel-primary">
            <div class="panel-heading">
               <h2>Laravel Video Upload Form- ScratchCode.io</h2>
            </div>
            <div class="panel-body">
               @if ($message = Session::get('success'))
                   <div class="alert alert-success alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $message }}</strong>
                   </div>
               @endif
 
               @if (count($errors) > 0)
               <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.
                  <ul>
                     @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
               @endif
 
               <form action="{{ route('pdfs.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
 
                     <div class="col-md-12">

                        <div class="col-md-6 form-group">
                           <label>leçon:</label>
                           <select name="leçon_id" id="">
                                @foreach($leçons as $leçon )
                                    <option value="{{$leçon->id}}">{{$leçon->nom}}</option>
                                @endforeach
                           </select>
                        </div>
                        <div class="col-md-6 form-group">
                           <label>Title:</label>
                           <input type="text" name="title" class="form-control"/>
                        </div>
                        <div class="col-md-6 form-group">
                           <label>Select pdf:</label>
                           <input type="file" name="pdf" class="form-control"/>
                        </div>
                        <div class="col-md-6 form-group">
                           <button type="submit" class="btn btn-success">Save</button>
                        </div>
                     </div>
                  </div>
               </form>
               <video src=""></video>
            </div>
         </div>
      </div>
   </body>
</html>
@endsection