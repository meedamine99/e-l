@extends('layouts.app')
@section('content')
    <div class="container">
      <form action="{{ route('formation.store')}}" method="POST">
      @if ( $errors->any() )
                    <div class="pb-0 alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        @csrf
        <div class="mb-3">
          <a class="link" href="{{route('formation.index')}}"><i class="fa-solid fa-arrow-left"></i> back</a>
        </div>
      
        <div class="mb-3">
          <label for=""  class="form-label">nom</label>
          <input type="text" name="nom_formation" id=""  class="form-control">
        </div>
        <div class="mb-3">
          <label for=""  class="form-label">date de début</label>
          <input type="date" name="date_début" id=""  class="form-control">
        </div>
        <div class="mb-3">
          <label for=""  class="form-label">date de fin</label>
          <input type="date" name="date_fin" id="" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">type</label>
          <input type="text" name="type" id=""  class="form-control">
        </div>
        <div class="mb-3">
          <button class="btn btn-primary" type="submit">create</button>
        </div>
      </form>
    </div>
@endsection