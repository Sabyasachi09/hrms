<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\users;
use App\user_detail;
use App\location;
use App\employee_type;
use App\pf_detail;
use App\esi_detail;
use App\mi_detail;
use App\company;
use App\designation;
use App\department;
use App\sport;
use App\institute;
use Session;

class UserControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = users::all();
        return view('navigation.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Session::has('employeeID')){
            return redirect('/');
        }
        // $lctn = new location();
        $locations = location::pluck('location', 'id');
        $employeeType = employee_type::pluck('emp_type', 'id');
        $companyType = company::pluck('company_name', 'id');
        $designation = designation::pluck('designation_desc', 'id');
        $departments = department::pluck('department_name', 'id');
        $sports = sport::pluck('sport_name', 'sport_id');
        $institutes = institute::pluck('institute', 'inst_id');

        // $user_data = users::all();
        return view('users.createuser')->with(['locations' => $locations, 'employee_type' => $employeeType, 'company_type' => $companyType, 'designation' => $designation, 'departments' => $departments, 'sports' => $sports, 'institutes' => $institutes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'company' => 'required',
            'employeetype' => 'required',
            'designation' => 'required',
            'department' => 'required',
            'location' => 'required',
            'mobile' => 'required',
            'emergency-contact-person' => 'required',
            'emergency-contact-number' => 'required',
            'official-email' => 'required',
            'personal-email' => 'required',
            'date-of-birth' => 'required',
            'gender' => 'required',
            'blood-group' => 'required',
            'maritial-status' => 'required',
            'educational-qualification' => 'required',
            'pan-number' => 'required',
            'aadhar-number' => 'required',
            'salary' => 'required',
            'salary-ac' => 'required',
            'personal-ac' => 'required',
            'father-name' => 'required',
            'present-address' => 'required',
            'permanent-address' => 'required'
        ]);

        $createUser = new users;
        $user_details = new user_detail;
        $pf_details = new pf_detail;
        $esi_details = new esi_detail;
        $mi_details = new mi_detail;

        $pf_details_names = array();
        $pf_details_relation = array();
        $pf_details_dob = array();
        $pf_details_aadhar = array();

        $esi_details_relation = array();
        $esi_details_names = array();
        $esi_details_dob = array();
        $esi_details_aadhar = array();

        $mi_details_relation = array();
        $mi_details_names = array();
        $mi_details_dob = array();
        $mi_details_aadhar = array();


        $CompanyID = $request->input('company');
        $EmployeeTypeID = $request->input('employeetype');
        $CompanyC = company::find($CompanyID);
        switch ($EmployeeTypeID) {
            case '1':
                $CompanyCode = $CompanyC->full_time_code;
                break;
            case '2':
                $CompanyCode = $CompanyC->part_time_code;
                break;
            case '3':
                $CompanyCode = $CompanyC->consultant_code;
                break;
            case '4':
                $CompanyCode = $CompanyC->intern_code;
                break;
        }
        
        $NumericPostFix = 9000;
        $EmployeeCount = users::where('employeeID', 'LIKE', "%{$CompanyCode}%")->count();
        $NumberofExistingEmployees = $EmployeeCount;
        $NumericPostFix = ($NumericPostFix+$NumberofExistingEmployees+1);
        $NumericPostFix = substr($NumericPostFix, 1);
        $NumericPostFix = '0'.$NumericPostFix;
        $employeeid = $CompanyCode.$NumericPostFix;
        
        $pf_details_names = $request->input('pf-family-name');
        $pf_details_relation = $request->input('pf-family-relation');
        $pf_details_dob = $request->input('pf-family-dob');
        $pf_details_aadhar = $request->input('pf-family-aadhar');

        $esi_details_names = $request->input('esi-family-name');
        $esi_details_relation = $request->input('esi-family-relation');
        $esi_details_dob = $request->input('esi-family-dob');
        $esi_details_aadhar = $request->input('esi-family-aadhar');

        $mi_details_names = $request->input('mi-family-name');
        $mi_details_relation = $request->input('mi-family-relation');
        $mi_details_dob = $request->input('mi-family-dob');
        $mi_details_aadhar = $request->input('mi-family-aadhar');

        $createUser->employeeID=$employeeid;
        $createUser->firstname=$request->input('firstname');
        $createUser->lastname=$request->input('lastname');
        
        $user_details->employeeID=$employeeid;
        $user_details->company=$request->input('company');
        $user_details->employee_type=$EmployeeTypeID;
        $user_details->designation=$request->input('designation');
        $user_details->level=$request->input('level');
        $user_details->department=$request->input('department');
        $user_details->project_division=$request->input('project-division');
        $user_details->doj= $request->input('date-of-joining');
        $user_details->contract_from= $request->input('contract-from');
        $user_details->contract_to= $request->input('contract-to');
        $user_details->school_academy=$request->input('school-academy');
        $user_details->sport=$request->input('sport');
        $user_details->location=$request->input('location');
        $user_details->mobile_no=$request->input('mobile');
        $user_details->emergency_contact_person=$request->input('emergency-contact-person');
        $user_details->emergency_contact_number=$request->input('emergency-contact-number');
        $user_details->official_email=$request->input('official-email');
        $user_details->personal_email=$request->input('personal-email');
        $user_details->dob=$request->input('date-of-birth');
        $user_details->gender=$request->input('gender');
        $user_details->blood_group=$request->input('blood-group');
        $user_details->maritial_status=$request->input('maritial-status');
        $user_details->educational_qualification=$request->input('educational-qualification');
        $user_details->sports_certification=$request->input('sports-certification');
        $user_details->experience_previous=$request->input('previous-experience');
        $user_details->pan_number=$request->input('pan-number');
        $user_details->aadhar_number=$request->input('aadhar-number');
        $user_details->uan=$request->input('uan');
        $user_details->esic_number=$request->input('esic');
        $user_details->passport_number=$request->input('passport-number');
        $user_details->salary_ac=$request->input('salary-ac');
        $user_details->personal_ac=$request->input('personal-ac');
        $user_details->salary=$request->input('salary');
        $user_details->gst=$request->input('gst');

        $user_details->pf_nominee_relation=$request->input('pf-nominee-relation');
        $user_details->pf_nominee_name=$request->input('pf-nominee-name');
        $user_details->pf_nominee_dob=$request->input('pf-nominee-dob');
        $user_details->pf_nominee_aadhar=$request->input('pf-nominee-aadhar');

        $user_details->esi_nominee_relation=$request->input('esi-nominee-relation');
        $user_details->esi_nominee_name=$request->input('esi-nominee-name');
        $user_details->esi_nominee_dob=$request->input('esi-nominee-dob');
        $user_details->esi_nominee_aadhar=$request->input('esi-nominee-aadhar');

        $user_details->father_name=$request->input('father-name');
        $user_details->mother_name=$request->input('mother-name');
        $user_details->present_address=$request->input('present-address');
        $user_details->permanent_address=$request->input('permanent-address');
        
            
            try{
                $createUser->save();
            }
            catch(\Illuminate\Database\QueryException $e){
                //  $e->getMessage();
                return redirect('/user')->with('error', 'Employee could not be added.');
            }

            try{
                $ifUserCreated = $user_details->save();
            }
            catch(\Illuminate\Database\QueryException $e){
                //  $e->getMessage();
                users::destroy($employeeid);
                return redirect('/user')->with('error', 'Employee could not be added.');
            }

            $pf_data = array();
            for($i=0; $i < count($pf_details_names); $i++){
                $temp_pf_array = array();
                $temp_pf_array = [
                    'employeeID' => $employeeid,
                    'relation' => $pf_details_relation[$i],
                    'name' => $pf_details_names[$i],
                    'dob' => $pf_details_dob[$i],
                    'aadhar_number' => $pf_details_aadhar[$i],
                ];
                array_push($pf_data, $temp_pf_array);
            }

            try{
                $ifPfDetailsRecorded = pf_detail::insert($pf_data);
            }
            catch(\Illuminate\Database\QueryException $e){
                //  $e->getMessage();
                user_detail::where('employeeID', $employeeid)->delete();
                users::where('employeeID', $employeeid)->delete();
                return redirect('/user')->with('error', 'Employee could not be added.');
            }

            $esi_data = array();
            for($i=0; $i < count($esi_details_names); $i++){
                $temp_esi_array = array();
                $temp_esi_array = [
                    'employeeID' => $employeeid,
                    'relation' => $esi_details_relation[$i],
                    'name' => $esi_details_names[$i],
                    'dob' => $esi_details_dob[$i],
                    'aadhar_number' => $esi_details_aadhar[$i],
                ];
                array_push($esi_data, $temp_esi_array);
            }

            try{
                $ifEsiDetailsRecorded = esi_detail::insert($esi_data);
            }
            catch(\Illuminate\Database\QueryException $e){
                //  $e->getMessage();
                user_detail::where('employeeID', $employeeid)->delete();
                pf_detail::where('employeeID', $employeeid)->delete();
                users::where('employeeID', $employeeid)->delete();            
                return redirect('/user')->with('error', 'Employee could not be added.');
            }

            $mi_data = array();
            for($i=0; $i < count($mi_details_names); $i++){
                $temp_mi_array = array();
                $temp_mi_array = [
                    'employeeID' => $employeeid,
                    'relation' => $mi_details_relation[$i],
                    'name' => $mi_details_names[$i],
                    'dob' => $mi_details_dob[$i],
                    'aadhar_number' => $mi_details_aadhar[$i],
                ];
                array_push($mi_data, $temp_mi_array);
            }   

            try{
                $ifMsiDetailsRecorded = mi_detail::insert($mi_data);
            }
            catch(\Illuminate\Database\QueryException $e){
                //  $e->getMessage();
                user_detail::where('employeeID', $employeeid)->delete();
                pf_detail::where('employeeID', $employeeid)->delete();
                esi_detail::where('employeeID', $employeeid)->delete();
                users::where('employeeID', $employeeid)->delete();
                return redirect('/user')->with('error', 'Employee could not be added.');
            }

            return redirect('/user')->with('success', 'Employee Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
        To view all the employees
    */
    public function viewall(){
        if(!Session::has('employeeID')){
            return redirect('/');
        }

        $user_data = users::all();
        // return $user_data;
        $employees = DB::table('users')
                ->leftJoin('user_details', 'user_details.employeeID', '=', 'users.employeeID')
                ->leftJoin('company', 'company.id', '=', 'user_details.company')
                ->leftJoin('department', 'department.id', '=', 'user_details.department')
                ->leftJoin('designation', 'designation.id', '=', 'user_details.designation')
                ->leftJoin('employee_types', 'employee_types.id', '=', 'user_details.employee_type')
                ->get();


        return view('users.viewallusers')->with(['users' => $employees]);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
