@extends('layouts.app')
@section('content')
    @foreach ($videos as $video)  
        @if($leçon == $video->leçon_id)

            <p>{{$video->title}}</p>
            <video controls   frameborder="0">
                <source src="{{ asset('vids/'.$video->path  ) }}">
            </video>
        @endif
    @endforeach
@endsection