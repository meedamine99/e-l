<?php

namespace App\Http\Controllers;

use App\Models\formation;
use App\Models\matiere;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function welcome(){
        $formations = formation::all();
        $matieres = matiere::all();
        return view('welcome', ['formations' => $formations, 'matieres' => $matieres]);
    }

    public function preview($id) {
        $matiere = matiere::find($id);
        return view('preview', ['matiere' => $matiere]);
    }
}
