<?php

namespace App\Http\Controllers\navigation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NavigationControllers extends Controller
{
    //
       // LoginPage 
    public function login(){
    	return view('navigation.login');
    }

    // Dashboard
    public function dashboard(){
    	return view('navigation.dashboard');
    }

    public function viewall(){
    	return view('users.viewallusers');
    }
}
