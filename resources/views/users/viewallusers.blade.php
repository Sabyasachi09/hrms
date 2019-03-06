@extends('layouts.app')

@section('page-content')

	@if( count($users) > 0)

		 <div class="container-fluid">

          <!-- Page Heading -->
          <center><h1 class="h3 mb-2 text-gray-800">View Employees</h1></center><hr></hr>
          <!-- <p class="mb-4">List of Employees.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of Employees</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Employee ID</th>
                      <th>Name</th>
                      <th>Company</th>
                      <th>Employee Type</th>
                      <th>Department</th>
                      <th>Designation</th>
                      <th>Mobile Number</th>
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
                    @foreach($users as $employee)
                    	<tr>
                    		<td><a href="#" onclick="getEmployeeDetails('{{ $employee-> employeeID}}');">{{ $employee-> employeeID}} </a></td>
                    		<td>{{ $employee-> firstname}} {{ $employee-> lastname}}</td>
                    		<td>{{ $employee-> company_name }} </td>
                    		<td>{{ $employee-> emp_type }} </td>
                    		<td>{{ $employee-> department_name }} </td>
                    		<td>{{ $employee-> designation_desc }} </td>
                    		<td>{{ $employee-> mobile_no }} </td>
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
<!-- {{ $users }} -->
@endsection()
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script type="text/javascript">
	
	function getEmployeeDetails(id){
		alert(id);
	}

	$(document).ready(function() {

	});

</script>