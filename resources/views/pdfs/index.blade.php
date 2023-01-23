@extends('layouts.app')
@section('content')
<style>
    iframe{
        width: 500px;
        height: 600px;
        display: inline-block;
    }
</style>
@if (Auth::user()->role == "admin")
    <a href="{{route('pdfs.create')}}">upload leçon</a>
@endif
    @foreach ($pdfs as $pdf)  
        @if($leçon == $pdf->leçon_id)

            <p>{{$pdf->title}}</p>
            <iframe  src="{{ asset('leçon_pdfs/'.$pdf->path  ) }}" frameborder="0"></iframe>
            {{-- < controls   frameborder="0">
                <source src="{{ asset('vids/'.$pdf->path  ) }}">
            </> --}}
        @endif
    @endforeach
@endsection