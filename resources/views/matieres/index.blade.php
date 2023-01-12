@extends('layouts.app')
@section('content')


                  
                  {{-- <div class="container ms-0 ps-0">
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
                        <tbody> --}}
                          
                          @foreach ($matieres as $matiere)
                          {{-- @if({{$formation }} == {{$matiere->formation->id}}) --}}
                            @if($formation == $matiere->formation_id)
                          
                            {{ $matiere->id }}
                           {{ $matiere->nom_matiere }}
                           {{ $matiere->formation->nom_formation }}
                          
                          @endif
                          @endforeach
                        {{-- </tbody>
                  </table>
                  </div> --}}
                
@endsection