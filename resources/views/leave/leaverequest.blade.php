@extends('layouts.app')
@section('page-content')
<center>
	<h2>Request For Leave</h2><hr><br>
	<link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
</center>

{!! Form::open(['action' => 'leaveController@request', 'method' => 'POST']) !!}
		
		<div class="row">
			<div class="col">
				
				<div class="form-group col-9">
					{{ Form::label('leaveType', 'Leave Type') }}
					{{ Form::select('leaveType', $leaveType, null, ['class' => 'form-control', 'placeholder' => 'Select Leave Type', 'onchange' => 'LeaveType()']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9" >
					{{ Form::label('numberOfLeave', 'Number of days') }}
					{{ Form::select('numberOfLeave', ['1' => 'One day leave', '2' => 'More than a day'], null, ['class' => 'form-control', 'id' => 'numOfDays' ,'placeholder' => 'Number of Days', 'onchange' => 'NumberOfDays()']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">

				<div class="form-group col-9" id="Lfrom" style="display: none;">
					{{ Form::label('leaveFrom', 'Date', ['id' => 'leaveFromLabel']) }}
					{{ Form::text('leaveFrom', '', ['class' => 'form-control']) }}
				</div>
			</div>
			<div class="col">
				<div class="form-group col-9" id="Lto" style="display: none;">
					{{ Form::label('leaveTill', 'To') }}
					{{ Form::text('leaveTill', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">

				<div class="form-group col-9">
					{{ Form::label('leaveReason', 'Reason') }}
					{{ Form::textarea('leaveReason', '', ['class' => 'form-control', 'style' => 'resize:none', 'rows' => 4, 'cols' => 54]) }}
				</div>
			</div>
			<div class="col">
			</div>
		</div>
		<br>
		<div class="form-group col-9" style="display: none;">
			{{ Form::label('employeeID', 'Employee ID') }}
			{{ Form::text('employeeID', Session::get('employeeID'), ['class' => 'form-control']) }}
		</div>
		<center>
			{{ Form::submit('Apply Leave', ['class' => 'btn btn-primary']) }}
		</center>
		<br>

	{!! Form::close() !!}

@endsection()

<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" >

	function NumberOfDays(){
		var NumOfdays = $('#numOfDays').val();
		if(NumOfdays == '1'){
			$('#leaveFromLabel').text('Date');
			$('#Lfrom').css('display', 'block');
			$('#Lto').css('display', 'none');
		}
		else if(NumOfdays == '2'){
			$('#leaveFromLabel').text('From');
			$('#Lfrom').css('display', 'block');
			$('#Lto').css('display', 'block');
		}
	}

	function LeaveType(){
		// var Leavetype = $("#leaveType").val();
		if($("#leaveType").val() == '3'){
			$("#numOfDays option:contains(\'More than a day\')").attr("disabled","disabled");
			 $("#numOfDays option[value='1']").prop('selected',true);
			 NumberOfDays();
		}
		else{
			$("#numOfDays option:contains(\'More than a day\')").prop("disabled", false);
		}
	}

</script>
