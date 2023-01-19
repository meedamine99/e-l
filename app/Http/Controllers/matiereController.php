<?php

namespace App\Http\Controllers;

use App\Models\formation;
use App\Models\matiere;
use Illuminate\Http\Request;

class matiereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $formation = $request->formation;
        $matieres = matiere::all();
        return view('matieres.index', [ 'matieres' => $matieres , 'formation' => $formation]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $formations = formation::all();
        return view('matieres.create',['formations' => $formations]);
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
            'nom_matiere' => 'required', 
            'formation_id' => 'required',
            ]);
        matiere::create($request->post());
        return redirect()->route('matieres.index')
            ->with('success','matiere created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(matiere $matiere)
    {
        return view('matieres.show', ['matiere' => $matiere]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(matiere $matiere)
    {
        $matiere->delete();
        return redirect()->route('matieres.index')
            ->with('success','commande deleted successfully');
    }
}
