<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = now()->format('y/m/d') ;

        $userCountLastWeek = User::whereBetween('created_at', [now()->subWeek(), now()])
            ->whereNot('role' , "admin")
            ->count();

        $userCount = User::whereNot('role' , "admin")->count();

        $formateurCount = User::where('role' , "formateur")->count();
        $etudCount = User::where('role' , "user")->count();

        $users= User::all();
        $usersNonAccess = 0;
        $usersAccess = 0;
        foreach ($users as $user ) {
            $found = access::where('user_id', $user->id)->count();
            if($found == 0 && $user->role == 'user'){
                
                $usersNonAccess += 1;
            }
        }


        foreach ($users as $user ) {
            $found = access::where('user_id', $user->id)->count();
            if($found != 0 && $user->role == 'user'){
                $usersAccess += 1;
            }
        }
        $role = Auth::user()->role;
        if($role == 'user' || $role == 'formateur' ){
            return view('home');
        }elseif($role == 'admin'){
            return view('admin' , 
            [
                'userCount' => $userCount,
                'userCountLastWeek' => $userCountLastWeek,
                'date' => $date,
                'formateurCount' => $formateurCount,
                'etudCount' => $etudCount,
                'usersNonAccess' => $usersNonAccess,
                'usersAccess' => $usersAccess,
            ]);
        }
    }
}
