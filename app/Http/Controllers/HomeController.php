<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $userCountLastWeek = User::whereBetween('created_at', [now()->subWeek(), now()])->count();
        $userCount = User::count();
        $role = Auth::user()->role;
        if($role == 'user' || $role == 'formateur' ){
            return view('home');
        }elseif($role == 'admin'){
            return view('admin' , ['userCount' => $userCount, 'userCountLastWeek' => $userCountLastWeek]);
        }
    }
}
