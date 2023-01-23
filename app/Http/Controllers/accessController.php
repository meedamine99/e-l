<?php

namespace App\Http\Controllers;

use App\Models\access;
use App\Models\matiere;
use App\Models\formation;
use Illuminate\Http\Request;

class accessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user;
        $userName = $request->userName;
        $formations = formation::all();
        $matieres = matiere::all();
        
        return view('access.index', [
            'user' => $user,
            'formations' => $formations, 
            'matieres' => $matieres, 
            'userName' => $userName,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->all();
        $input['matiere'] = $request->input('matiere');
        foreach($input['matiere'] as $matiere){
            $found = access::where('user_id', $request->user_id)->where('matiere_id', $matiere)->count();
            if($found == 0) {
                    $access = new access();
                    $access->matiere_id = $matiere;
                    $access->user_id = $request->user_id;

                    $access->save();
           }
        }
        return redirect()->route('users.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function destroy($id)
    {
        //
    }
}
