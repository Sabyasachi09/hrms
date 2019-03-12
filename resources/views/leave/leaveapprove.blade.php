@extends('layouts.app')
@section('page-content')
<center>
	<h2>Review Leave</h2><hr><br>
	<link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
</center>
	@if( count($RequestedLeave) > 0)

		 <div class="container-fluid">

	      <!-- Page Heading -->
	      <!-- <center><h1 class="h3 mb-2 text-gray-800">Request for Leave</h1></center><hr></hr> -->
	      <!-- <p class="mb-4">List of Employees.</p> -->

	      <!-- DataTales Example -->
	      <div class="card shadow mb-4">
	        <div class="card-header py-3">
	          <h6 class="m-0 font-weight-bold text-primary">List of Request</h6>
	        </div>
	        <div class="card-body">
	          <div class="table-responsive">
	          	<meta name="csrf-token" content="{{ csrf_token() }}" />
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	              <thead>
	                <tr>
	                  <th>Name</th>
	                  <th>Leave Type</th>
	                  <th>Leave Description</th>
	                  <th colspan="2"><center>Action</center></th>
	                </tr>
	              </thead>
	         <!--      <tfoot>
	                <tr>
	                  <th>Name</th>
	                  <th>Position</th>
	                  <th>Office</th>
	                  <th>Age</th>
	                  <th>Start date</th>
	                  <th>Salary</th>
	                </tr>
	              </tfoot> -->
	              <tbody>
	                @foreach($RequestedLeave as $employee)
	                	<tr id="{{ $employee-> leave_id }}">
	                		<td>{{ $employee-> firstname}} {{ $employee-> lastname}}</td>
	                		<td><a href="#" onclick="getEmployeeDetails('{{ $employee-> employeeID}}');">{{ $employee-> leave_desc }} </a></td>
	                		@if($employee-> number_of_leave == '1')
	                			<td>Leave on {{ $employee-> leave_from }}</td>
	                		@else
	                			<td>{{ $employee-> number_of_leave }} days, from {{ $employee-> leave_from }} to {{ $employee-> leave_to }}</td>
	                		@endif
	                		<td><center><a onclick="Approve('{{  $employee-> leave_id }}')" class="btn btn-success" style="color:white;">Approve</a></center></td>
	                		<td><center><a onclick="Reject('{{  $employee-> leave_id }}')" class="btn btn-danger" style="color:white;">Reject</a></center></td>
	                	</tr>
	                @endforeach
	              </tbody>
	            </table>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- /.container-fluid -->
	@endif

@endsection()

<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript" >

	function Approve(id){
		$.ajaxSetup({
        	headers: {
            	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
    	});
		var sure = confirm('Approve the leave for '+id);
		if(sure){
			$.ajax({
				type: 'POST',
				url: '/leave/approved',
				dataType: "json",
				data: {id:id},
				// data: {
				// 	id : id,
				// 	_token:     '{{ csrf_token() }}'
				// },
				success: function(data){
					alert(data);
					$('#'+id).fadeOut();
				},
				error: function(){
					alert('Request could not be completed, try again');
				}
			});
		}
		
	}
	

	function Reject(id){
		$.ajaxSetup({
        	headers: {
            	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	}
    	});
		var sure = confirm('Reject leave for '+id);
		if(sure){
			$.ajax({
				type: 'POST',
				url: '/leave/reject',
				dataType: "json",
				data: {id:id},
				success: function(data){
					alert(data);
					$('#'+id).fadeOut();
				},
				error: function(){
					alert('Request could not be completed, try again');
				}
			});
		}
	}

</script>

