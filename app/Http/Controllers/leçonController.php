<?php

namespace App\Http\Controllers;

use App\Models\leçon;
use App\Models\access;
use App\Models\formation;
use App\Models\matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class leçonController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $matieres = $request->matiere;
        $nom_matiere = $request->nom_matiere;
       
        $leçon = leçon::where('matiere_id', $matieres)->get();
        $found = access::where('user_id', Auth::user()->id)->where('matiere_id', $matieres)->count();
        if($found == 1 || Auth::user()->role == 'admin') {
            return view('leçon.index', [ 'leçon' => $leçon , 'matieres' => $matieres,  'nom_matiere' => $nom_matiere ]);
        }else {
            return Redirect()->back()->with('noAccess', "Vous n'avez pas l'accés a cette matiere");
        }
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
        return view('leçon.create', [ 'matieres' => $matieres, 'formations' => $formations ]);
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
            'nom' => 'required|string',
            'matiere_id' => 'required',
            ]);
            $matiere = $request->matiere_id;
            $nom_matiere = matiere::where('id' , $matiere)->first('nom_matiere');
            $nom_matiere = $nom_matiere->nom_matiere;
        leçon::create($request->post());
        return redirect()->route('leçon.index', ['matiere' => $matiere, 'nom_matiere' =>$nom_matiere])
            ->with('success','La leçon est créer avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(leçon $leçon)
    {
        return view('leçon.show', ['leçon' => $leçon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(leçon $leçon)
    {
        return view('leçon.edit', ['leçon' => $leçon]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, leçon $leçon)
    {
        $request->validate([
            'nom' => 'required|string',
            'matiere_id' => 'required',
            ]);  

            $leçon->fill($request->post())->save();
            return redirect()->route('leçon.index')
                ->with('success','La leçon est modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $matiere = $request->matiere;
        $leçon = leçon::find($id);
        $leçon->delete();
        return redirect()->route('leçon.index', ['matiere' => $matiere])
            ->with('success','La leçon est supprimer avec succés');
    }
}
