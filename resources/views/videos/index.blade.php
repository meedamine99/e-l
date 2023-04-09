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
.con .main-video video{
    width:100% ;
    border-radius: 5px;
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
.con .video-list .vid video{
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
        <h2>Les vidéo</h2>
        @if($message = Session::get('success'))
        <div class="success">
            <p class="alert alert-success">{{$message}}</p>
        </div>
        @endif
        @if (Auth::user()->role == "admin")
            <a href="{{route('videos.create')}}"> <i class="fa-solid fa-plus"></i> Uploader un vidéo</a>
        @endif
    <div class="con">
        @if($videos->count() > 0)
        @foreach ($videos as $video)  
            
                <div class="main-video">
                    <div class="video">
                        <video src="{{ asset('vids/'.$video->path  ) }}" controls></video>
                        <h3 class="title">{{$video->title}}</h3> 
                    </div>
                </div>
                @break
                
                @endforeach
                <div class="video-list">
                    @foreach ($videos as $video)  
                    
                    <div class="vid active">
                        <video src="{{ asset('vids/'.$video->path  ) }}" muted></video>
                        <h3 class="title">{{$video->title}}</h3>
                        @if (Auth::user()->role == "admin")
                        <form class="ms-auto" style="display: inline-block" action="{{ route('videos.destroy', $video->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="leçon_id" id="" value=" {{$video->leçon_id}} ">
                                <button class="btn btn-danger" onclick="return confirm('do u really want to delete this video?')" type="submit">Supprimer</button>
                            </form>
                        @endif
                    </div>
                    
                    @endforeach
                </div>
    </div>
</div>
        @else
                <p class="text-center alert alert-danger">Aucun video</p>
                
        @endif
    <script> 
        let listVideo = document.querySelectorAll('.video-list .vid');
        let mainVideo = document.querySelector('.main-video video');
        let title = document.querySelector('.main-video .title');
 
        listVideo.forEach(video =>{
             video.onclick = () =>{
                 listVideo.forEach(vid => vid.classList.remove('active'));
                 video.classList.add('active');
                 if(video.classList.contains('active')){
                     let src = video.children[0].getAttribute('src');
                     console.log(src);
                     mainVideo.src = src;
                     let text = video.children[1].innerHTML;
                     title.innerHTML = text;
                 };
             
             }; 
        });
     </script>
@endsection