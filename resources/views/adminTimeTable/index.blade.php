@extends('layouts.app')
@section('content')
@vite(['resources/js/tableHours.js'])
<a href=" {{route('adminTimeTable.create')}} ">create</a>
    hi this is time table

<style>
    td , th {border: 1px solid black;}
</style>
    <div>
        {{-- <table border="2">
            <tr id="time">
                <td></td>
            </tr>
            @foreach($adminTimeTable as $time)
            <tr id="days">
                    <td>
                        {{$time->formateur}}
                        {{$time->formateur}}
                    </td>
                </tr>
                @endforeach
        </table> --}}
        <table border="2">
            <tr>
                <th>matiere</th>
                <th>heur debut</th>
                <th>heur fin</th>
                <th>day</th>
                <th>formateur</th>
                <th>actions</th>
            </tr>
            @foreach($adminTimeTable as $time)
            <tr>
                    <td>
                        {{$time->matiere->nom_matiere}}
                    </td>
                    <td>
                        {{$time->heur_start}}
                    </td>
                    <td>
                        {{$time->heur_end}}
                    </td>
                    <td>
                        {{$time->day}}
                    </td>
                    <td>
                        {{$time->user->nom}}
                        {{$time->user->prenom}}
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('adminTimeTable.edit', $time->id) }}">Modifier</a>
                        <form style="display: inline-block" action="{{ route('adminTimeTable.destroy', $time->id) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('do u really want to delete this formation?')" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    </div>
    <script>
        
    </script>
@endsection