<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\users;
use Session;


class loginController extends Controller
{
    //

    public function verifyuser(Request $request){

    	$this->validate($request, [
    		'employeeID' => 'required',
    		'password' => 'required'
    	]);

    	$verify = new users;

    	$VERIFY = DB::table('users')
    		->where([
    			['employeeID', '=', $request->employeeID],
    			['password', '=', $request->password]
    		])->get();


    	
    		
    	if(count($VERIFY) > 0){
    		foreach ($VERIFY as $empDetails) {
    			$firstname = $empDetails->firstname;
    			$role = $empDetails->roleID;
    		}
    		Session::put('employeeID', $request->employeeID);
    		Session::put('name', $firstname);
    		Session::put('role', $role);
    		if(Session::has('employeeID')){
    			return redirect('/dashboard');
    		}
    		else{
    			return redirect('/')->with('error', 'Incorrect Credentials');	
    		}
    	}
    	else{
    		return redirect('/')->with('error', 'Incorrect Credentials');
    	}

    	

    }
}
