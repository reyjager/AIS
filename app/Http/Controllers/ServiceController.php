<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
     public function index()
    {
        $username = Auth::user()->name;
        $isAdmin = Auth::user()->isadmin;
        // dd($isAdmin);

       return view('content.service',['username'=>$username, 'isAdmin' => $isAdmin]);

    }
}
