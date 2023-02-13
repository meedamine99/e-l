<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\access;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::paginate(10);
        return view('users.index', [ 'users' => $users  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        $user->role = 'formateur';
        $user->fill($request->post())->save();
        return redirect()->route('users.index');
    }

    public function nonAccess(){
            $users = User::all()->where('role' , 'user');
            $accesses = access::all();
            $nonAccess = [];
            foreach($accesses as $access){
                foreach($users as $user){
                if ( $access->user_id != $user->id && !in_array( $user,  $nonAccess)){
                        $nonAccess[] = $user;
                }
            }
            }
        return view('users.nonAccess', ['nonAccess' => $nonAccess]);
    }

    /** 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')
            ->with('success','Utilisateur est supprimer avec succés');
    }
}
