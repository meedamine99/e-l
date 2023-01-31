@extends('layouts.app')
@section('content')

hi admin
    {{ $userCount}}
    {{$date}} <br>
    in the last week {{$userCountLastWeek}}<br>
    les formateur {{$formateurCount}}<br>
    les etud {{$etudCount}}<br>
    les users non access {{$usersNonAccess}}<br>
    les users with access {{$usersAccess}}<br>
@endsection