<?php

namespace App\Http\Controllers;

use App\Models\formation;
use Illuminate\Http\Request;

class formationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formation = formation::all();
        return view('formation.index', [ 'formation' => $formation ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formation.create');
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
            'nom_formation' => 'required|string',
            'date_début' => 'required|date',
            'date_fin' => 'required|date',
            'image' => 'required|mimes:png,jpg,jpeg'
            ]);
            $imageName = $request->image->hashName();
            

            $request->image->move(public_path('formation_images'), $imageName);

            $formation = new formation();
            $formation->nom_formation = $request->nom_formation;
            $formation->date_début = $request->date_début;
            $formation->date_fin = $request->date_fin;
            $formation->path = $imageName;
            $formation->type = $request->type;
            

            $formation->save();

        
        return redirect()->route('formation.index')
            ->with('success','La formation est créer avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(formation $formation)
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
        $formation = formation::find($id);
        return view('formation.edit', ['formation' => $formation]);
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
            'nom_formation' => 'required',
            'date_début' => 'required',
            'date_fin' => 'required',
            'image' => 'mimes:png,jpg,jpeg'

            ]);

            $formation = formation::find($id);
            if($request->hasFile('image')){
                
                
                $imageName = $request->image->hashName();
                

                $request->image->move(public_path('formation_images'), $imageName);

                $formation->nom_formation = $request->nom_formation;
                $formation->date_début = $request->date_début;
                $formation->date_fin = $request->date_fin;
                $formation->path = $imageName;
                $formation->type = $request->type;
                

                $formation->save();
                
            }else {
                
                $formation->nom_formation = $request->nom_formation;
                $formation->date_début = $request->date_début;
                $formation->date_fin = $request->date_fin;
                $formation->path = $formation->path;
                $formation->type = $request->type;
                $formation->save();
            }
            return redirect()->route('formation.index')
                ->with('success','La formation est modifier avec succés');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formation = formation::find($id);
        $formation->delete();
        return redirect()->route('formation.index')
            ->with('success','La formation est supprimer avec succés');
    }
}
