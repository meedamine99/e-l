<?php

namespace App\Http\Controllers;

    use App\Models\Video;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;
    
    class VideoController extends Controller
    {
        public function getVideoUploadForm()
        {
            return view('video-upload');
        }
    
        public function uploadVideo(Request $request)
    {
            $this->validate($request, [
                'title' => 'required|string|max:255',
                'video' => 'required|file|mimes:mp4,mov,wmv,avi',
            ]);
    
            $fileName = $request->video->getClientOriginalName();
            $file = md5(rand(0,1000)). $fileName ;
            $filePath = 'videos/' . $file;
    
            $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
    
            // File URL to access the video in frontend
            $url = Storage::disk('public')->url($filePath);
    
            if ($isFileUploaded) {
                $video = new Video();
                $video->title = $request->title;
                $video->path = $filePath;
                $video->save();
    
                return back()
                ->with('success','Video has been successfully uploaded.');
            }
    
            return back()
                ->with('error','Unexpected error occured');
        }
    }