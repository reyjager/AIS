<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{
    //
    public function index()
    {
        $username = Auth::user()->name;
        $isAdmin = Auth::user()->isadmin;
        // dd($isAdmin);

       return view('content.profile',['username'=>$username, 'isAdmin' => $isAdmin]);

    }
}
