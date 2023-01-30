<?php

namespace App\Http\Controllers;

use App\Models\pdf;
use App\Models\leçon;
use Illuminate\Http\Request;

class pdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $pdfs = pdf::all();
        $leçon = $request->leçon;
        return view('pdfs.index', [ 'pdfs' => $pdfs , 'leçon' => $leçon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leçons = leçon::all();
        return view('pdfs.create', ['leçons' => $leçons]);
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
            'pdf' => 'required|file|mimes:pdf',
        ]);
        $pdfName = $request->pdf->hashName();

        $request->pdf->move(public_path('leçon_pdfs'), $pdfName);

        $pdf = new pdf();
        $pdf->path = $pdfName;
        $pdf->title = $request->title;
        $pdf->leçon_id = $request->leçon_id;

        $pdf->save();
        return back()
            ->with('success','You have successfully upload file.');
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
