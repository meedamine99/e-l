<?php

namespace App\Http\Controllers;

use App\Models\pdf;
use App\Models\lecon;
use App\Models\matiere;
use App\Models\formation;
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
        $lecon = $request->lecon;
        return view('pdfs.index', [ 'pdfs' => $pdfs , 'lecon' => $lecon]);
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
        return view('pdfs.create', ['lecons' => $lecons, 'matieres' => $matieres, 'formations' => $formations]);
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
            'pdf' => 'required|file|mimes:pdf',
        ]);
        $pdfName = $request->pdf->hashName();

        $request->pdf->move(public_path('lecon_pdfs'), $pdfName);

        $pdf = new pdf();
        $pdf->path = $pdfName;
        $pdf->title = $request->title;
        $pdf->lecon_id = $request->lecon_id;

        $pdf->save();
        $lecon = $request->lecon_id;
        return redirect()->route('pdfs.index', ['lecon' => $lecon])
            ->with('success','pdf uploader avec succés');
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
        $pdf = pdf::find($id);
        $pdf->delete();
        $lecon = $request->lecon_id;
        return redirect()->route('pdfs.index', ['lecon' => $lecon])
            ->with('success','pdf supprimé avec succés');
    }
}
