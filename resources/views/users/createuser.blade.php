@extends('layouts.app')
@section('page-content')
<center>
	<h2>Add Employee</h2><hr><br>
	<link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
</center>
<!-- <div class="well"> -->
	<!-- <div class="card shadow mb-4">

	<div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Add Employee</h6>
    </div>
    <div class="card-body"> -->
	{!! Form::open(['action' => 'users\UserControllers@store', 'method' => 'POST']) !!}

		<div class="row">
			<div class="col">
				
				<div class="form-group col-9">
					{{ Form::label('company', 'Company') }}
					{{ Form::select('company', $company_type, null, ['class' => 'form-control', 'placeholder' => 'Select Company']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('employeetype', 'Employee Type') }}
					{{ Form::select('employeetype', $employee_type, null, ['class' => 'form-control', 'onchange' => '__empType()' , 'placeholder' => 'Select Employee Type']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">

				<div class="form-group col-9">
					{{ Form::label('firstname', 'Firstname') }}
					{{ Form::text('firstname', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('lastname', 'Lastname') }}
					{{ Form::text('lastname', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('designation', 'Designation') }}
					{{ Form::select('designation', $designation, null, ['class' => 'form-control', 'onchange' => '__designation()', 'placeholder' => 'Select Designation']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('level', 'Level') }}
					{{ Form::select('level', ['1' => 'Level 1', '2' => 'Level 2'], null, ['class' => 'form-control', 'placeholder' => 'Select Level']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('department', 'Department') }}
					{{ Form::select('department', $departments, null, ['class' => 'form-control', 'placeholder' => 'Select Department']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('project-division', 'Project/Division') }}
					{{ Form::text('project-division', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9" id="sports-field" style="display: none;">
					{{ Form::label('sport', 'Sport') }}
					{{ Form::select('sport', $sports, null, ['class' => 'form-control', 'placeholder' => 'Select Sport']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9" id="school-academy-fiels" style="display: none;">
					{{ Form::label('school-academy', 'School/Academy') }}
					{{ Form::select('school-academy', $institutes, null, ['class' => 'form-control', 'placeholder' => 'Select School / Academy']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9" id="doj-field" style="display: none;">
					{{ Form::label('date-of-joining', 'Date of Joining') }}
					{{ Form::text('date-of-joining', '', ['class' => 'form-control']) }}
				</div>
				
				<div class="form-group col-9" id="contract-from-field" style="display: none;">
					{{ Form::label('contract', 'Contract From') }}
					{{ Form::text('contract-from', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9" id="contract-to-field" style="display: none;">
					{{ Form::label('contract', 'Contract To') }}
					{{ Form::text('contract-to', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('location', 'Location') }}
					{{ Form::select('location', $locations, null , ['class' => 'form-control', 'id' => 'location', 'placeholder' => 'Select Location']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9" >
					{{ Form::label('mobile', 'Mobile Number') }}
					{{ Form::text('mobile', '', ['class' => 'form-control', 'id' => 'mobile', 'onkeypress' => ' return isNumberKey(event)', 'maxlength' => '10']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('emergency-contact-person', 'Emergency Contact Person\'s Name') }}
					{{ Form::text('emergency-contact-person', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('emergency-contact-number', 'Emergency Contact Number') }}
					{{ Form::text('emergency-contact-number', '', ['class' => 'form-control', 'onkeypress' => ' return isNumberKey(event)', 'maxlength' => '10']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('official-email', 'Officail eMail') }}
					{{ Form::text('official-email', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('personal-email', 'Personal eMail') }}
					{{ Form::text('personal-email', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('date-of-birth', 'Date of Birth') }}
					{{ Form::text('date-of-birth', '', ['class' => 'form-control', 'id' => 'datetimepicker4']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('gender', 'Gender') }}
					{{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female', 'Others' => 'Others'], null, ['class' => 'form-control', 'placeholder' => 'Select Gender']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('blood-group', 'Blood Group') }}
					{{ Form::select('blood-group', ['A+' => 'A+', 'A-' => 'A-', 
						'B+' => 'B+', 'B-' => 'B-', 
						'O+' => 'O+', 'O-' => 'O-', 
						'AB+' => 'AB+', 'AB-' => 'AB-',  

					], null, ['class' => 'form-control', 'placeholder' => 'Select Blood Group']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('maritial-status', 'Maritial Status') }}
					{{ Form::select('maritial-status', ['Single' => 'Single', 'Married' => 'Married', 'Widowed' => 'Widowed', 'Divorced / Separated' => 'Divorced / Separated'] ,null, ['class' => 'form-control', 'placeholder' => 'Select Maritial Status']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('educational-qualification', 'Educational Qualification') }}
					{{ Form::select('educational-qualification', ['UG' => 'UG', 'PG' => 'PG', 'Others' =>'Others'], null, ['class' => 'form-control', 'placeholder' => 'Select Educational Qualification']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('educational-qualification_details', 'Educational Qualification Details') }}
					{{ Form::textarea('educational-qualification-details', '', ['class' => 'form-control', 'style' => 'resize:none', 'rows' => 4, 'cols' => 54]) }}
				</div>
			</div>
	</div>
		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('sports-certification', 'Sports Certification') }}
					{{ Form::textarea('sports-certification', '', ['class' => 'form-control', 'style' => 'resize:none', 'rows' => 4, 'cols' => 54]) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('previous-experience', 'Previous Experience') }}
					{{ Form::textarea('previous-experience', '', ['class' => 'form-control', 'style' => 'resize:none', 'rows' => 4, 'cols' => 54]) }}
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('pan-number', 'PAN Number') }}
					{{ Form::text('pan-number', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('aadhar-number', 'Aadhar Number') }}
					{{ Form::text('aadhar-number', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('passport-number', 'Passport Number') }}
					{{ Form::text('passport-number', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
			
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('father-name', 'Father\'s Name') }}
					{{ Form::text('father-name', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('mother-name', 'Mother\'s Name') }}
					{{ Form::text('mother-name', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('uan', 'UAN') }}
					{{ Form::text('uan', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('esic', 'ESIC') }}
					{{ Form::text('esic', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('personal-ac', 'Personal A/C') }}
					{{ Form::text('personal-ac', '', ['class' => 'form-control', 'onkeypress' => ' return isNumberKey(event)']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('salary-ac', 'Salary A/C') }}
					{{ Form::text('salary-ac', '', ['class' => 'form-control', 'onkeypress' => ' return isNumberKey(event)']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('salary', 'Salary CTC') }}
					{{ Form::text('salary', '', ['class' => 'form-control', 'onkeypress' => ' return isNumberKey(event)']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('gst', 'GST Number') }}
					{{ Form::text('gst', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<hr></hr>
		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('pf-details', 'PF Nominee') }} <br></br>
					{{ Form::text('pf-nominee-relation', '', ['class' => 'form-control', 'placeholder' => 'Relation with this person']) }}
					{{ Form::text('pf-nominee-name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
					{{ Form::text('pf-nominee-dob', '', ['class' => 'form-control', 'placeholder' => 'Date of birth']) }}
					{{ Form::text('pf-nominee-aadhar', '', ['class' => 'form-control', 'placeholder' => 'Aadhar Number']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9 pf-field">
					{{ Form::label('pf-family-details', 'Family Members') }}&nbsp;&nbsp;
					<a style="color:white;" class="btn btn-primary PF_add_field_button">Add More Members</a><br></br>
					{{ Form::text('pf-family-relation[]', '', ['class' => 'form-control', 'placeholder' => 'Relation with this person']) }}
					{{ Form::text('pf-family-name[]', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
					{{ Form::text('pf-family-dob[]', '', ['class' => 'form-control', 'placeholder' => 'Date of birth']) }}
					{{ Form::text('pf-family-aadhar[]', '', ['class' => 'form-control', 'placeholder' => 'Aadhar Number']) }}
				</div>
			</div>
		</div>
		<hr></hr>
		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('esi-nominee', 'ESI Nominee') }} <br></br>
					{{ Form::text('esi-nominee-relation', '', ['class' => 'form-control', 'placeholder' => 'Relation with this person']) }}
					{{ Form::text('esi-nominee-name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
					{{ Form::text('esi-nominee-dob', '', ['class' => 'form-control', 'placeholder' => 'Date of birth']) }}
					{{ Form::text('esi-nominee-aadhar', '', ['class' => 'form-control', 'placeholder' => 'Aadhar Number']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9 esi-field">
					{{ Form::label('esi-family-details', 'ESI Family Details') }}&nbsp;&nbsp;
					<a style="color:white;" class="btn btn-primary ESI_add_field_button">Add More Members</a><br></br>
					{{ Form::text('esi-family-relation[]', '', ['class' => 'form-control', 'placeholder' => 'Relation with this person']) }}
					{{ Form::text('esi-family-name[]', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
					{{ Form::text('esi-family-dob[]', '', ['class' => 'form-control', 'placeholder' => 'Date of birth']) }}
					{{ Form::text('esi-family-aadhar[]', '', ['class' => 'form-control', 'placeholder' => 'Aadhar Number']) }}
				</div>
			</div>
		</div>
		<hr></hr>
		<div class="row">
			<div class="col">
				<div class="form-group col-9 mi-field">
					{{ Form::label('medical-insurance', 'Medical Insurance - Family Details') }}&nbsp;&nbsp;
					<a style="color:white;" class="btn btn-primary MI_add_field_button">Add More Members</a><br></br>
					{{ Form::text('mi-family-relation[]', '', ['class' => 'form-control', 'placeholder' => 'Relation with this person' ]) }}
					{{ Form::text('mi-family-name[]', '', ['class' => 'form-control', 'placeholder' => 'Name' ]) }}
					{{ Form::text('mi-family-dob[]', '', ['class' => 'form-control', 'placeholder' => 'Date of Birth' ]) }}
					{{ Form::text('mi-family-aadhar[]', '', ['class' => 'form-control', 'placeholder' => 'Aadhar Number' ]) }}
				</div>
			</div>
		</div>
		<hr></hr>
		<div class="row">
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('present-address', 'Present Address') }}
					{{ Form::textarea('present-address', '', ['class' => 'form-control', 'style' => 'resize:none', 'rows' => 4, 'cols' => 54] )}}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9">
					{{ Form::label('permanent-address', 'Permanent Address') }}
					{{ Form::textarea('permanent-address', '', ['class' => 'form-control', 'style' => 'resize:none', 'rows' => 4, 'cols' => 54]) }}
				</div>
			</div>
		</div>
		<br>
		
		<center>
			{{ Form::submit('Add Employee', ['class' => 'btn btn-primary']) }}
		</center>
		<br>
	{!! Form::close() !!}
<!-- </div>
</div> -->

@endsection()
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<!-- <link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" /> -->
<!-- <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->
<script type="text/javascript" >


$( "#date-of-birth" ).datepicker({
format: "mm/dd/yy",
weekStart: 0,
calendarWeeks: true,
autoclose: true,
todayHighlight: true,
rtl: true,
orientation: "auto"
});

	function __empType(){

		if($('#employeetype').val() == 1){
			$('#contract-from-field').css('display', 'none');
			$('#contract-to-field').css('display', 'none');
			$('#doj-field').css('display', 'block');
		}
		else{
			$('#doj-field').css('display', 'none');
			$('#contract-from-field').css('display', 'block');
			$('#contract-to-field').css('display', 'block');
		}
	}
	function __designation(){
		if( $("#designation option:selected").text() === 'Coach'){
			$('#sports-field').css('display', 'block');
			$('#school-academy-fiels').css('display', 'block');
		}
		else{
			$('#sports-field').css('display', 'none');
			$('#school-academy-fiels').css('display', 'none');
		}
	}

	$(document).ready(function() {
		var PF_max_fields      = 10; 
		var PF_wrapper   		= $(".pf-field"); 
		var PF_add_button      = $(".PF_add_field_button"); 

		var ESI_max_fields      = 10;
		var ESI_wrapper   		= $(".esi-field"); 
		var ESI_add_button      = $(".ESI_add_field_button"); 

		var MI_max_fields      = 10;
		var MI_wrapper   		= $(".mi-field"); 
		var MI_add_button      = $(".MI_add_field_button"); 

		var x = 1;
		var y = 1;
		var z = 1;

		$(PF_add_button).click(function(e){ 
			e.preventDefault();
			if(x < PF_max_fields){ 
				x++; 
				$(PF_wrapper).append('<div><br></br><input type="text" name="pf-family-relation[]" class="form-control" placeholder="Relation with this person"/><input type="text" name="pf-family-name[]" class="form-control" placeholder="Name"/><input type="text" name="pf-family-dob[]" class="form-control" placeholder="Date of birth"/><input type="text" name="pf-family-aadhar[]" class="form-control" placeholder="Aadhar Number"/><a href="#" class="remove_field">Remove</a></div>'); 
			}
		});
		
		$(PF_wrapper).on("click",".remove_field", function(e){ 
			e.preventDefault(); $(this).parent('div').remove(); x--;
		})


		$(ESI_add_button).click(function(e){ 
			e.preventDefault();
			if(y < ESI_max_fields){ 
				y++; 
				$(ESI_wrapper).append('<div><br></br><input type="text" name="esi-family-relation[]" class="form-control" placeholder="Relation with this person"/><input type="text" name="esi-family-name[]" class="form-control" placeholder="Name"/><input type="text" name="esi-family-dob[]" class="form-control" placeholder="Date of birth"/><input type="text" name="esi-family-aadhar[]" class="form-control" placeholder="Aadhar Number"/><a href="#" class="remove_field">Remove</a></div>'); 
			}
		});
		
		$(ESI_wrapper).on("click",".remove_field", function(e){ 
			e.preventDefault(); $(this).parent('div').remove(); y--;
		})

		$(MI_add_button).click(function(e){ 
			e.preventDefault();
			if(z < MI_max_fields){ 
				z++; 
				$(MI_wrapper).append('<div><br></br><input type="text" name="mi-family-relation[]" class="form-control" placeholder="Relation with this person"/><input type="text" name="mi-family-name[]" class="form-control" placeholder="Name"/><input type="text" name="mi-family-dob[]" class="form-control" placeholder="Date of birth"/><input type="text" name="mi-family-aadhar[]" class="form-control" placeholder="Aadhar Number"/><a href="#" class="remove_field">Remove</a></div>'); 
			}
		});
		
		$(MI_wrapper).on("click",".remove_field", function(e){ 
			e.preventDefault(); $(this).parent('div').remove(); y--;
		})

	});

	function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
		return true;
	}
            $(function () {
                $('#datetimepicker4').datetimepicker();
            });

</script>

