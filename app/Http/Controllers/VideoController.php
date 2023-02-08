<?php

namespace App\Http\Controllers;

use App\Models\leçon;
use App\Models\video;
use Illuminate\Http\Request;

class videoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $videos = video::all();
        $leçon = $request->leçon;
        return view('videos.index', [ 'videos' => $videos , 'leçon' => $leçon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leçons = leçon::all();
        return view('videos.create', ['leçons' => $leçons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'leçon_id' => 'required',
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,mov',
        ]);
        $videoName = $request->video->hashName();

        $request->video->move(public_path('vids'), $videoName);

        $video = new video();
        $video->path = $videoName;
        $video->title = $request->title;
        $video->leçon_id = $request->leçon_id;

        $video->save();

        $leçon = $request->leçon_id;
        return redirect()->route('videos.index', ['leçon' => $leçon])
            ->with('success','vidéo uploader avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
