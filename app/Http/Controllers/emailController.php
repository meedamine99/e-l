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
        Mail::to('medaminerouibeh99@gmail.com')->send(new emailMail($request->name, $request->email, $request->content));
        return redirect('/');
    }
}
