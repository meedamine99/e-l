<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class profileController extends Controller
{
    
    public function edit_informations(){
        return view('profile.changeInformations');
    }


    public function update_informations(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'CIN' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'password' => 'required',
        ]);
        if(Hash::check($request->password, auth()->user()->password)){
            auth()->user()->nom = $request->nom;
            auth()->user()->prenom = $request->prenom;
            auth()->user()->CIN = $request->CIN;
            auth()->user()->ville = $request->ville;
            auth()->user()->telephone = $request->telephone;
            auth()->user()->adresse = $request->adresse;
            auth()->user()->updated_at = now();
        }

        $request->user()->save();

        return redirect()->route('home')
            ->with('status', 'profile informations updated');
    }

    public function edit_Password(){
        return view('profile.changePassword');
    }

    public function update_password(Request $request)
    {
            $request->validate([
                'current_password'=>'current_password|required',
                'password'=>'required|min:8|max:100|confirmed',
                'password_confirmation '=>'same:password'
                ]);
            
            $user = auth()->user();

            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            $user->password = Hash::make($request->password);
            
            $request->user()->save();

             return redirect()->route('home')
                ->with('status', 'password updated');
    }

    public function destroy(Request $request)
    {

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
