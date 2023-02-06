@extends('layouts.app')
@section('content')
<div class="container">
                <h2> {{ __('users') }}</h2>
   
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
                    <div class="les_card">
                            
                            @foreach ($users as $user)
                            @if ($user->role != 'admin')
                            <div class="une_card">    
                            
                                <div >{{ $user->CIN }}</div>
                              <div>
                                <a href=" {{route('access.index', ['user' => $user->id, 'userName' => $user->nom])}} ">{{ $user->nom }} {{ $user->prenom }}</a>
                                
                              </div>
                              <div>{{ $user->role }}</div>
                              {{-- <td>{{ $user->ville }}</td> --}}
                              <div>
                                   
                                  <form style="display: inline-block" action="{{ route('users.update', $user->id) }}" method="Post">
                                      @csrf
                                      @method('put')
                                      <button class="btn btn-outline-primary" onclick="return confirm('formateur ?')" type="submit"> make formateur</button>
                                    </form>
                              </div>
                            
                            </div>
                            @endif
                            @endforeach
                            <div class="pagination">
                              {{ $users->links('pagination.custom') }}
                            </div>
                          </div>
                          
    </div>
  </div>
@endsection