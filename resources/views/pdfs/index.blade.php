@extends('layouts.app')
@section('content')
<style>
.con{
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap:15px ;
    align-items: flex-start;
    padding: 5px 5%;
}
.con .main-video{
    background: #fff;
    border-radius: 5px;
    padding: 10px;
}   
.con .main-video iframe{
    width: 100%;
        height: 600px;
        display: inline-block;
} 
.con .main-video .title{
    color: #333;
    font-size: 23px;
    padding-top: 15px;
    padding-bottom: 15px;
}
.con .video-list{
    background: #fff;
    border-radius: 5px;
    height: 520px;
    overflow-y: scroll;
}
.con .video-list iframe {
    display: none;
}
.con .video-list::-webkit-scrollbar{
    width: 7px;
}
.con .video-list::-webkit-scrollbar-track{
    background: #ccc;
    border-radius: 50px;
}
.con .video-list::-webkit-scrollbar-thumb{
    background: #666;
    border-radius: 50px;
}
.con .video-list .vid iframe{
    width: 100px;
    border-radius: 5px;
}
.con .video-list .vid{
    display: flex;
    align-items: center;
    gap: 15px;
    background: #f7f7f7;
    border-radius: 5px;
    margin: 10px;
    padding: 10px;
    border: 1px solid rgb(0, 0, 0,.1 );
    cursor: pointer;
}
.con .video-list .vid:hover{
    background: #eee;
}
.con .video-list .vid.active{
    background: #2980b9;
}
.con .video-list .vid.active .title{
   color: #fff;
}
.con .video-list .vid .title{
    color: #333;
    font-size: 17px;
}
@media (max-width:991px){
    .con{
        grid-template-columns: 1.5fr 1fr;
        padding:10px;
    }
}
@media (max-width:768px){
    .con{
        grid-template-columns: 1fr;
    }
} 
</style>
<div class="container">
    <a href="javascript:history.back()" ><i class="fa-solid fa-left-long"></i></a>
    <h2>Les PDF</h2>
    @if (Auth::user()->role == "admin")
        <a href="{{route('pdfs.create')}}"><i class="fa-solid fa-plus"></i> Uploader un PDF</a>
    @endif
    <div class="con">
        @foreach ($pdfs as $pdf)
            @if($leçon == $pdf->leçon_id)
                <div class="main-video">
                    <div class="video">
                        <iframe src="{{ asset('leçon_pdfs/'.$pdf->path  ) }}" controls></iframe>
                        <h3 class="title">{{$pdf->title}}</h3>
                    </div>
                </div>
                @break
                @endif
                @endforeach
                <div class="video-list">
                    @foreach ($pdfs as $pdf)
                    @if($leçon == $pdf->leçon_id)
                    <div class="vid active">
                        <iframe src="{{ asset('leçon_pdfs/'.$pdf->path  ) }}" muted></iframe>
                        <h3 class="title">{{$pdf->title}}</h3>
                    </div>
                    @endif
                    @endforeach
                </div>
    </div>
</div>
    <script> 
        let listVideo = document.querySelectorAll('.video-list .vid');
        let mainVideo = document.querySelector('.main-video iframe');
        let title = document.querySelector('.main-video .title');
 
        listVideo.forEach(iframe =>{
             iframe.onclick = () =>{
                 listVideo.forEach(vid => vid.classList.remove('active'));
                 iframe.classList.add('active');
                 if(iframe.classList.contains('active')){
                     let src = iframe.children[0].getAttribute('src');
                     mainVideo.src = src;
                     let text = iframe.children[1].innerHTML;
                     title.innerHTML = text;
                 };
             
             }; 
        });
     </script>




{{-- 
     --}}
@endsection