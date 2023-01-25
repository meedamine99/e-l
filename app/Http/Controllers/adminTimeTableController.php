<?php

namespace App\Http\Controllers;

use App\Models\matiere;
use App\Models\formation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\adminTimeTable;
use Illuminate\Foundation\Auth\User;

class adminTimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminTimeTable = adminTimeTable::all();
        return view('adminTimeTable.index', ['adminTimeTable' => $adminTimeTable,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formateurs =  User::all()-> where('role' ,"formateur");
        $formations = formation::all();
        $matieres = matiere::all(); 
        return view('adminTimeTable.create',
        [
            'formations' => $formations,
            'formateurs' => $formateurs,
            'matieres' => $matieres,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adminTimeTable = new adminTimeTable();
        $adminTimeTable->user_id = $request->formateur;
        $adminTimeTable->heur_start = $request->heur_start;
        $adminTimeTable->heur_end = $request->heur_end;
        $adminTimeTable->matiere_id = $request->matiere;
        $adminTimeTable->day = $request->day;
        $adminTimeTable->save();

        return redirect()->route('adminTimeTable.index')
            ->with('success','session created successfully');
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
    public function edit(adminTimeTable $adminTimeTable)
    {
        $formateurs =  User::all()-> where('role' ,"formateur");
        $formations = formation::all();
        $matieres = matiere::all(); 
        return view('adminTimeTable.edit',
        [
            'adminTimeTable' => $adminTimeTable,
            'formations' => $formations,
            'formateurs' => $formateurs,
            'matieres' => $matieres,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adminTimeTable $adminTimeTable)
    {

        $adminTimeTable->fill($request->post())->save();
        return redirect()->route('adminTimeTable.index')
            ->with('success','session modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(adminTimeTable $adminTimeTable)
    {
        $adminTimeTable->delete();
        return redirect()->route('adminTimeTable.index')
            ->with('success','adminTimeTable destroyed successfully');
    }
}
