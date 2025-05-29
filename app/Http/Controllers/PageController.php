<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showDashboard()
    {
        return view('content.dashboard');
    }
    public function showProfile()
    {
        return view('content.profile');
    }
    public function showSettings()
    {
        return view('content.settings');
    }
    public function showAbout()
    {
        return view('content.about');
    }
    public function showEditProfile(){
        return view('content.edit-profile');
    }
    public function editProfile(){





        return redirect()->route('profile');
    }
}