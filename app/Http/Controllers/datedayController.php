<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dateday;
use App\Models\contenu;
use App\Models\formation;
use App\Models\matiere;
use App\Models\User;

class datedayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dateday = dateday::all();
        $contenu = contenu::all();
        return view('dateday.index', [ 'dateday' => $dateday , 'contenu' => $contenu ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datedays = dateday::all();
        $formateurs =  User::all()-> where('role' ,"formateur");
        $formations = formation::all();
        $matieres = matiere::all(); 
        return view('dateday.create');
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
            'date' => 'required',
            'day' => 'required'
            ]);
        dateday::create($request->post());
        return redirect()->route('dateday.index')
            ->with('success','dateday created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(dateday $dateday)
    {
        return view('dateday.show', ['dateday' => $dateday]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(dateday $dateday)
    {
        return view('dateday.edit', ['dateday' => $dateday]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,dateday $dateday)
    {
        $request->validate([
            'date' => 'required',
            'day' => 'required'

            ]);


            $dateday->fill($request->post())->save();
            return redirect()->route('dateday.index')
                ->with('success','dateday edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(dateday $dateday)
    {
        $dateday->delete();
        return redirect()->route('dateday.index')
            ->with('success','dateday destroyed successfully');
    }
}
