<?php

namespace App\Http\Controllers;

use App\Models\access;
use App\Models\matiere;
use App\Models\formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $nom_formation = $request->nom_formation;
        
        $accesses = access::all();
        $matieres = matiere::where('formation_id', $formation)->get();
        
        return view('matieres.index', [ 'matieres' => $matieres , 'formation' => $formation, 'nom_formation' => $nom_formation, 'accesses' => $accesses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            'nom_matiere' => 'required|string', 
            'formation_id' => 'required',
            'preview' => 'required|mimes:pdf',
            ]); 
            $formation = $request->formation_id;
            $nom_formation = formation::where('id' , $formation)->first('nom_formation');
            $nom_formation = $nom_formation->nom_formation;

            $previewName = $request->preview->hashName();
            
            $request->preview->move(public_path('matiere_previews'), $previewName);

            $matiere = new matiere();
            $matiere->nom_matiere = $request->nom_matiere;            
            $matiere->formation_id = $request->formation_id;            
            $matiere->path = $previewName;

            

            $matiere->save();

        
        return redirect()->route('matieres.index', ['formation' => $formation, 'nom_formation' => $nom_formation])
            ->with('success','La matière est créer avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response 
     */
    public function show(matiere $matiere)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formations = formation::all();
        $matiere = matiere::find($id);
        return view('matieres.edit',['formations' => $formations , 'matiere' => $matiere]);
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
       
        $request->validate([
            'nom_matiere' => 'required|string', 
            'formation_id' => 'required',
            'preview' => 'mimes:pdf'
            ]); 
            $matiere = matiere::find($id);

            if($request->hasFile('preview')){
                $previewName = $request->preview->hashName();
                
                $request->preview->move(public_path('matiere_previews'), $previewName);

                $matiere->nom_matiere = $request->nom_matiere;
                $matiere->formation_id = $request->formation_id;
                $matiere->path = $previewName;
                $matiere->save();
                
            }else {
                $matiere->nom_matiere = $request->nom_matiere;
                $matiere->formation_id = $request->formation_id;
                $matiere->save();
            }

            $formation = $request->formation_id;

            $nom_formation = formation::where('id' , $formation)->first('nom_formation');
            $nom_formation = $nom_formation->nom_formation;
            return redirect()->route('matieres.index', ['formation' => $formation, 'nom_formation' => $nom_formation])
            ->with('success','La matière est modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $matiere = matiere::find($id);
        $matiere->delete();
        $formation = $request->formation;
        return redirect()->route('matieres.index', ['formation' => $formation])
            ->with('success','La matiere est supprimer avec succés');
    }
}
