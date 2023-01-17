<?php

namespace App\Http\Controllers;

use App\Models\leçon_pdf;
use Illuminate\Http\Request;

class leçonpdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leçonpdf = leçon_pdf::all();
        return view('leçonpdf.index', [ 'leçonpdf' => $leçonpdf ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('leçonpdf.create');
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
            leçon_pdf::create($request->post());
        return redirect()->route('leçonpdf.index')
            ->with('success','leçonpdf created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(leçon_pdf $leçon_pdf)
    {
        return view('leçonpdf.show', ['leçonpdf' => $leçon_pdf]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(leçon_pdf $leçon_pdf)
    {
        return view('leçonpdf.edit', ['leçonpdf' => $leçon_pdf]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, leçon_pdf $leçon_pdf)
    {
        $request->validate([
            'id' => 'required',
            'pdffile' => 'required',
        ]);   

            $leçon_pdf->fill($request->post())->save();
            return redirect()->route('leçonpdf.index')
                ->with('success','leçonpdf edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(leçon_pdf $leçon_pdf)
    {
        $leçon_pdf->delete();
        return redirect()->route('leçonpdf$leçonpdf.index')
            ->with('success','pdf destroyed successfully');
    }
}
