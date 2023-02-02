<?php

namespace App\Http\Controllers;

use App\Http\Requests\emailRequest;
use App\Mail\emailMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class emailController extends Controller
{
    public function submit(emailRequest $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email:filter',
            'content' => 'required',
            ]);  
            
        Mail::to('medaminerouibeh99@gmail.com')->send(new emailMail(strip_tags($request->name), strip_tags($request->email), strip_tags($request->content)));
        return redirect('/');
    }
}
