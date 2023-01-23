<?php

namespace App\Http\Controllers;

use App\Models\leçon;
use App\Models\access;
use App\Models\matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
    
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
        $leçon = leçon::all();
        $found = access::where('user_id', Auth::user()->id)->where('matiere_id', $matieres)->count();
        if($found == 1 || Auth::user()->role == 'admin') {
            return view('leçon.index', [ 'leçon' => $leçon , 'matieres' => $matieres ]);
        }else {
            return 'not welcome here';
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
        return view('leçon.create', [ 'matieres' => $matieres ]);
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
            
            'nom' => 'required',
            'matiere_id' => 'required',
            ]);
        leçon::create($request->post());
        return redirect()->route('leçon.index')
            ->with('success','leçon created successfully');
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
            'id' => 'required',
            'nom' => 'required',
            'id_matiere' => 'required',
            'id_pdf' => 'required',
            'id_video' => 'required',
        ]);   

            $leçon->fill($request->post())->save();
            return redirect()->route('leçon.index')
                ->with('success','leçon edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(leçon $leçon)
    {
        $leçon->delete();
        return redirect()->route('leçon$leçon.index')
            ->with('success','leçon destroyed successfully');
    }
}
