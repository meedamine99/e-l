<?php

namespace App\Http\Controllers;

use App\Models\lecon;
use App\Models\access;
use App\Models\formation;
use App\Models\matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class leconController extends Controller
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
       
        $lecon = lecon::where('matiere_id', $matieres)->get();
        $found = access::where('user_id', Auth::user()->id)->where('matiere_id', $matieres)->count();
        if($found == 1 || Auth::user()->role == 'admin') {
            return view('lecon.index', [ 'lecon' => $lecon , 'matieres' => $matieres,  'nom_matiere' => $nom_matiere ]);
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
        return view('lecon.create', [ 'matieres' => $matieres, 'formations' => $formations ]);
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
        lecon::create($request->post());
        return redirect()->route('lecon.index', ['matiere' => $matiere, 'nom_matiere' =>$nom_matiere])
            ->with('success','La lecon est créer avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(lecon $lecon)
    {
        return view('lecon.show', ['lecon' => $lecon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matieres = matiere::all();
        $formations = formation::all();
        $lecon = lecon::find($id);
        return view('lecon.edit', [ 'matieres' => $matieres, 'formations' => $formations, 'lecon' => $lecon ]);
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
            'nom' => 'required|string',
            'matiere_id' => 'required',
            ]);  
            $lecon = lecon::find($id);
            $lecon->fill($request->post())->save();

            $matiere = $request->matiere_id;
            $nom_matiere = matiere::where('id' , $matiere)->first('nom_matiere');
            $nom_matiere = $nom_matiere->nom_matiere;

            return redirect()->route('lecon.index', ['matiere' => $matiere, 'nom_matiere' =>$nom_matiere])
                ->with('success','La lecon est modifier avec succés');
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
        $lecon = lecon::find($id);
        $lecon->delete();
        return redirect()->route('lecon.index', ['matiere' => $matiere])
            ->with('success','La lecon est supprimer avec succés');
    }
}
