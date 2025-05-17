<?php

namespace App\Http\Controllers;

use App\Models\lecon;
use App\Models\video;
use App\Models\matiere;
use App\Models\formation;
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
        
        $lecon = $request->lecon;
        $videos = video::where('lecon_id', $lecon)->get();
        return view('videos.index', [ 'videos' => $videos , 'lecon' => $lecon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $matieres = matiere::all();
        $formations = formation::all();
        $lecons = lecon::all();
        return view('videos.create', ['lecons' => $lecons, 'matieres' => $matieres, 'formations' => $formations]);
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
            'lecon_id' => 'required',
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4,mov',
        ]);
        $videoName = $request->video->hashName();

        $request->video->move(public_path('vids'), $videoName);

        $video = new video();
        $video->path = $videoName;
        $video->title = $request->title;
        $video->lecon_id = $request->lecon_id;

        $video->save();

        $lecon = $request->lecon_id;
        return redirect()->route('videos.index', ['lecon' => $lecon])
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
    public function destroy($id, Request $request)
    {
        $video = video::find($id);
        $video->delete();
        $lecon = $request->lecon_id;
        return redirect()->route('videos.index', ['lecon' => $lecon])
            ->with('success','vidéo supprimé avec succés');
    }
}
