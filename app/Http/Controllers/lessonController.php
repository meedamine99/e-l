<?php

namespace App\Http\Controllers;

use App\Models\lesson;
use Illuminate\Http\Request;
    
class lessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesson = lesson::all();
        return view('lesson.index', [ 'lesson' => $lesson ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lesson.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'id_matiere' => 'required',
            'id_pdf' => 'required',
            'id_video' => 'required',
            ]);
        lesson::create($request->post());
        return redirect()->route('lesson.index')
            ->with('success','lesson created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(lesson $lesson)
    {
        return view('lesson.show', ['lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(lesson $lesson)
    {
        return view('lesson.edit', ['lesson' => $lesson]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lesson $lesson)
    {
        $request->validate([
            'id' => 'required',
            'nom' => 'required',
            'id_matiere' => 'required',
            'id_pdf' => 'required',
            'id_video' => 'required',
        ]);   

            $lesson->fill($request->post())->save();
            return redirect()->route('lesson.index')
                ->with('success','lesson edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lesson$lesson.index')
            ->with('success','lesson$lesson destroyed successfully');
    }
}
