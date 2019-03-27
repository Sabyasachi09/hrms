<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\salary_constant;
use App\salara_variable;



class payrollController extends Controller
{
    //

    public function generate(){

    	$PayRollData = DB::table('users')
            ->leftJoin('user_details', 'user_details.employeeID', '=', 'users.employeeID')
            ->leftJoin('salary_constants', 'salary_constants.employeeID', '=', 'users.employeeID')
            ->leftJoin('salary_variables', 'salary_variables.employeeID', '=', 'users.employeeID')
            ->get();

    	return view('payroll.gen_invoice')->with(['payRollData' => $PayRollData]);
    }
}
