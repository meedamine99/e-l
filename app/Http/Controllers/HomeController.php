<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\access;
use App\Models\matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    $usersData = User::where('role', 'user')->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
        ->get();

    $teachers = User::where('role', 'formateur')->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])
        ->get();

    $data = [];
    foreach ($usersData as $user) {
        $data[] = $user->created_at->format('Y-m-d');
    }
    foreach ($teachers as $teacher) {
        $data[] = $teacher->created_at->format('Y-m-d');
    }

    $uniqueDates = array_unique($data);

    $dates = [];
    $userCounts = [];
    $teacherCounts = [];
    foreach ($uniqueDates as $date) {
        $dates[] = $date;
        $userCounts[] = User::where('role', 'user')->whereDate('created_at', $date)->count();
        $teacherCounts[] = User::where('role', 'formateur')->whereDate('created_at', $date)->count();
    }

    $matieres = matiere::join('accesses', 'matieres.id', '=', 'accesses.matiere_id')
                    ->where('accesses.user_id' , Auth::user()->id)
                    ->get();

            
        $role = Auth::user()->role;
        if($role == 'user' || $role == 'formateur' ){
            return view('home', [
                'matieres' => $matieres,
            ]);
        }elseif($role == 'admin'){
            return view('admin' ,compact('dates', 'userCounts','teacherCounts'), 
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
