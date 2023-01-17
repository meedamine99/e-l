<?php

namespace App\Http\Controllers;

use App\Models\lesson_pdf;
use Illuminate\Http\Request;

class lessonpdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessonpdf = lesson_pdf::all();
        return view('lessonpdf.index', [ 'lessonpdf' => $lessonpdf ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessonpdf.create');
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
            'pdffile' => 'required',
            ]);
            lesson_pdf::create($request->post());
        return redirect()->route('lessonpdf.index')
            ->with('success','lessonpdf created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(lesson_pdf $lesson_pdf)
    {
        return view('lessonpdf.show', ['lessonpdf' => $lesson_pdf]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(lesson_pdf $lesson_pdf)
    {
        return view('lessonpdf.edit', ['lessonpdf' => $lesson_pdf]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lesson_pdf $lesson_pdf)
    {
        $request->validate([
            'id' => 'required',
            'pdffile' => 'required',
        ]);   

            $lesson_pdf->fill($request->post())->save();
            return redirect()->route('lessonpdf.index')
                ->with('success','lessonpdf edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(lesson_pdf $lesson_pdf)
    {
        $lesson_pdf->delete();
        return redirect()->route('lessonpdf$lessonpdf.index')
            ->with('success','lessonpdf$lessonpdf destroyed successfully');
    }
}
