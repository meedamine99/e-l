@extends('layouts.app')
@section('content')
    <table border="2">
            <tr>
                <th>matiere</th>
                <th>heur debut</th>
                <th>heur fin</th>
                <th>day</th>
                <th>formateur</th>
            </tr>
                @foreach ($sessions as $session)
            <tr>
                    <td>
                        {{$session->matiere->nom_matiere}}
                    </td>
                    <td>
                        {{$session->heur_start}}
                    </td>
                    <td>
                        {{$session->heur_end}}
                    </td>
                    <td>
                        {{$session->day}}
                    </td>
                    <td>
                        {{$session->user->nom}}
                        {{$session->user->prenom}}
                    </td>
                </tr>
                @endforeach
        </table>
@endsection