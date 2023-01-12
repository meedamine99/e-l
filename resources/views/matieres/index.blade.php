@extends('layouts.app')
@section('content')

<h2></h2>
                  
                  <div class="container ms-0 ps-0">
                    @if($message = Session::get('success'))
                    <div class="text-success" role="alert">
                      {{$message}}
                    </div>
                  @endif
                    <table>
                      <thead>
                          <tr>
                            <th>ID</th>
                            <th>nom matiere</th>
                            <th>formation</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($matieres as $matiere)
                          @if ($request )
                          <tr>
                            <th>{{ $matiere->id }}</th>
                            <td>{{ $matiere->nom_matiere }}</td>
                            <td>{{ $matiere->formation->nom_formation }}</td>
                          </tr>
                              
                          @endif
                          @endforeach
                        </tbody>
                  </table>
                  </div>
                
@endsection