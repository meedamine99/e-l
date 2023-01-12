@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('users') }}</div>
   
                <div class="card-body">
                  {{-- <form class="mb-3"  action="{{url('admin/search')}}">
                    <input
                        name="query"
                        class="form-control"
                        type="search"
                        placeholder="Search with nom"
                        aria-label="Search"
                        list="lesnom"
                      />
                    <datalist id="lesnom">
                        @foreach ($allusers as $user)
                          <option value="{{ $user->nom }}"></option>
                        @endforeach
                      </datalist>
                    <button class="btn btn-primary" type="submit">search</button>
                  </form> --}}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- {{ __('You are logged in!') }} --}}
                    @if($message = Session::get('success'))
                      <div class="text-success" role="alert">
                        {{$message}}
                      </div>
                    @endif
                    <a class="link-primary mb-3 d-inline-block" href=" {{route('users.create')}} "><i class="fa-solid fa-plus"></i> {{ __('Add a user')}}</a>
                    <table class="table table-striped table-hover {{-- table-bordered --}} text-center align-middle ">
                        <thead>
                            <tr>
                              <th scope="col">CIN</th>
                              <th scope="col">nom</th>
                              <th scope="col">prenom</th>
                              <th scope="col">role</th>
                              {{-- <th scope="col">ville</th> --}}
                              <th scope="col">actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            @foreach ($users as $user)
                            @if ($user->role != 'admin')
                                
                            <tr>
                                <th scope="row">{{ $user->CIN }}</th>
                              <td>{{ $user->nom }}</td>
                              <td>{{ $user->prenom }}</td>
                              <td>{{ $user->role }}</td>
                              {{-- <td>{{ $user->ville }}</td> --}}
                              <td>
                                   
                                  <form style="display: inline-block" action="{{ route('users.update', $user->id) }}" method="Post">
                                      @csrf
                                      @method('put')
                                      <button class="btn btn-outline-primary" onclick="return confirm('formateur ?')" type="submit"><i class="fa-solid fa-trash"></i> make formateur</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                          </tbody>
                    </table>
                    <div>
                      {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection