<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\user_detail;
use App\leave_type;
use App\leave_record;
use App\leave_quota;
use Session;
use DateTime;
class leaveController extends Controller
{
    //

    public function request(Request $request){

    	$LeaveType = leave_type::pluck('leave_desc', 'id');

    	if(Session::has('employeeID')){
            
            if(isset($_POST['employeeID'])){
                
                $this->validate($request, [
                    'employeeID' => 'required',
                    'leaveType' => 'required',
                    'leaveFrom' => 'required',
                    'leaveReason' => 'required'
                ]);

                $addLeaveRequest = new leave_record();
                $UserDetails = new user_detail();

                $addLeaveRequest->employeeID = $request->input('employeeID');
                $ManagerID = $UserDetails->where('employeeID', $request->input('employeeID'))->value('managerID');

                $addLeaveRequest->managerID = $ManagerID;
                $addLeaveRequest->leave_type = $request->input('leaveType');
                $NumOfDays = $request->input('numberOfLeave');

                if($NumOfDays == '1'){
                    $addLeaveRequest->leave_from = $request->input('leaveFrom');
                    $addLeaveRequest->number_of_leave = $request->input('numberOfLeave');

                }
                else{

                    $LeaveFrom = $request->input('leaveFrom');
                    $LeaveTill = $request->input('leaveTill');

                    $date1 = new DateTime($LeaveFrom);
                    $date2 = new DateTime($LeaveTill);
                    $interval = $date1->diff($date2);

                    $addLeaveRequest->leave_from = $LeaveFrom;
                    $addLeaveRequest->leave_to = $LeaveTill;  
                    $addLeaveRequest->number_of_leave = ($interval->days+1);                  
                }
                $addLeaveRequest->leave_reason = $request->input('leaveReason');

                try{
                    $addLeaveRequest->save();
                    return redirect('/leave/request')->with('success','Leave request has been initiated.');
                }
                catch(\Illuminate\Database\QueryException $e){
                    //  $e->getMessage();
                    return redirect('/leave/request')->with('error','Request could not be initiated, please try again.');
                }

            }
            else{
                
                return view('leave.leaverequest')->with(['employeeID' => Session::get('employeeID'), 'leaveType' => $LeaveType]);
            }
        }
        else{
            return view('leave.login');
        }
    }

    public function approve(){

    	if(Session::has('employeeID')){
            $leaveRecord = new leave_record();
            $RequestedLeave = $leaveRecord
             ->leftJoin('leave_types', 'leave_records.leave_type', '=', 'leave_types.id')
             ->leftJoin('users', 'leave_records.employeeID', '=', 'users.employeeID')
             ->where('managerID', Session::get('employeeID'))
                ->where('leave_status', '=', '1')->get();
            return view('leave.leaveapprove')->with(['employeeID' => Session::get('employeeID'), 'RequestedLeave' => $RequestedLeave]);
        }
        else{
            return view('navigation.login');
        }
    }

    public function approve_leave(Request $request){
        $leaveID = $request->id;
        $employeeID = $request->employeeid;
        $TotalLeave = $request->leave;
        $leaveRecord = new leave_record();
        $leaveQuota = new leave_quota();   
        $LeaveStatus = DB::table('leave_quota')->where('employeeID', '=', $employeeID)->get();
        if($LeaveStatus){
            foreach ($LeaveStatus as $Lvalue) {
                $Comp_Quota = $Lvalue->comp_quota;
                $Casual_Quota = $Lvalue->casual_quota;
                $Earned_Quota = $Lvalue->earned_quota;
            }

            // Deduction from Comp Off quota
            if($TotalLeave > $Comp_Quota){
                $DeductionFromCompOff = (($TotalLeave + $Comp_Quota) - $TotalLeave);
                $CurrentTotalLeave = ($TotalLeave - $DeductionFromCompOff);
                
                // Update comp_quota column

                // Deduction from casual quota
                if($CurrentTotalLeave > $Casual_Quota){
                    $DeductionFromCasualQuota = ( ($CurrentTotalLeave + $Casual_Quota) - $CurrentTotalLeave);
                    $CurrentTotalLeave = ($CurrentTotalLeave - $DeductionFromCasualQuota);
                    // Update casual quota 

                    
                    if($CurrentTotalLeave > $Earned_Quota){
                        $DeductionFromEarnedQuota = ( ($CurrentTotalLeave + $Earned_Quota) - $CurrentTotalLeave);
                        $CurrentTotalLeave = ($CurrentTotalLeave - $DeductionFromEarnedQuota);



                    }
                    elseif ($CurrentTotalLeave < $Earned_Quota) {
                        $DeductionFromEarnedQuota = ($Earned_Quota - $CurrentTotalLeave);
                    }
                    elseif ($CurrentTotalLeave == $Earned_Quota) {
                        $DeductionFromEarnedQuota = $Earned_Quota;
                    }

                }
                elseif ($CurrentTotalLeave < $Casual_Quota) {
                    $DeductionFromCasualQuota = ($Casual_Quota - $CurrentTotalLeave);
                }
                elseif ($CurrentTotalLeave == $Casual_Quota) {
                    $DeductionFromCasualQuota = $Casual_Quota;
                }

            }
            elseif ($TotalLeave < $Comp_Quota) {
                $DeductionFromCompOff = ( $Comp_Quota - $TotalLeave );                
            }
            elseif ( $TotalLeave == $Comp_Quota ) {
                $DeductionFromCompOff = $Comp_Quota;
            }

            if($Comp_Quota == 2){
                return json_encode($Comp_Quota);
            }
            else{
                return json_encode($LeaveStatus);
            }

            // var_dump($LeaveStatus);
        }

        // if(count($LeaveStatus) > 0){
        //     $Comp_Quota = $LeaveStatus->comp_quota;
        //     $Casual_Quota = $LeaveStatus->casual_quota;
        //     $Earned_Quota = $LeaveStatus->earned_quota;

        //     $leaveStatus = 2;
        //     try{
        //         $leaveRecord
        //         ->where('leave_id', $leaveID)
        //         ->update(['leave_status' => $leaveStatus]);
        //     return response()->json(['success'=>'Got Simple Ajax Request.']);
        //         // return ('Leave approved');
        //     }
        //     catch(\Illuminate\Database\QueryException $e){
        //         //  $e->getMessage();
        //         // return redirect('/leave/request')->with('error','Request could not be initiated, please try again.');
        //     }

        // }

        // if($Comp_Quota > 0 ){
        //     try{
        //         $leaveQuota
        //         ->where('employeeID', $employeeID)
        //         ->update(['comp_quota' => ($Comp_Quota-1) ]);
        //     }
        //     catch(\Illuminate\Database\QueryException $e){
        //         //  $e->getMessage();
        //         // return redirect('/leave/request')->with('error','Request could not be initiated, please try again.');
        //     }

        // }

        // $leaveStatus = 2;
        // try{
        //     $leaveRecord
        //     ->where('leave_id', $leaveID)
        //     ->update(['leave_status' => $leaveStatus]);
        // return response()->json(['success'=>'Got Simple Ajax Request.']);
        //     // return ('Leave approved');
        // }
        // catch(\Illuminate\Database\QueryException $e){
        //     //  $e->getMessage();
        //     // return redirect('/leave/request')->with('error','Request could not be initiated, please try again.');
        // }

    }

    public function reject_leave(Request $request){
        $leaveID = $request->id;
        $employeeID = $request->employeeid;
        $leaveRecord = new leave_record();
        $leaveQuota = new leave_quota();   
        // $LeaveStatus = $leaveQuota->where('employeeID', '=', $employeeID)->get();
        $leaveStatus = 3;
        try{
            $leaveRecord
            ->where('leave_id', $leaveID)
            ->update(['leave_status' => $leaveStatus]);
        return response()->json(['success'=>'Got Simple Ajax Request.']);
        }
        catch(\Illuminate\Database\QueryException $e){
            //  $e->getMessage();
            // return redirect('/leave/request')->with('error','Request could not be initiated, please try again.');
        }
    }

}
