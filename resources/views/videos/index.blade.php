@extends('layouts.app')
@section('content')
@if (Auth::user()->role == "admin")
    <a href="{{route('videos.create')}}">upload a video</a>
@endif
    @foreach ($videos as $video)  
        @if($leçon == $video->leçon_id)

            <p>{{$video->title}}</p>
            <video controls   frameborder="0">
                <source src="{{ asset('vids/'.$video->path  ) }}">
            </video>
        @endif
    @endforeach
@endsection