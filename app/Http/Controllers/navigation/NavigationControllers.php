<?php

namespace App\Http\Controllers\navigation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class NavigationControllers extends Controller
{
    //
       // LoginPage 
    public function login(){
        Session::forget('employeeID');
    	return view('navigation.login');
    }

    public function logout(){
        Session::flush();
        return redirect('/');
    }

    // Dashboard
    public function dashboard(){
        if(Session::has('employeeID')){
    	   return view('navigation.dashboard')->with(['employeeID' => Session::get('employeeID')]);
        }
        else{
            return view('navigation.login');
        }
    }

    public function viewall(){

    	return view('users.viewallusers');
    }
}
