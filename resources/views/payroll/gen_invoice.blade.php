@extends('layouts.app')
@section('page-content')
<center>
	<h2>Generate Payslips</h2><hr><br>
	<link href="{{ asset('/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
</center>
<center>
	<button class="btn btn-primary">Generate Payslips</button>
</center><br>
<!-- {{$payRollData}} -->

@foreach($payRollData as $employee)
	@if($employee->Basic != 0)
	<?php $LOP=($employee->Pay_Days - $employee->Present_Days);
		$TotalEarnings = 0;
		$TotalBaseEarning = 0;
		$TotalExtraEarning = 0;
		$TotalDeducations = 0;
		$LOPDeduction = 0;
		$NetPay = 0;

		$TotalBaseEarning = ($employee->Basic + $employee->HRA);

	?>
	<div class="container-fluid">

	      <!-- Page Heading -->
	      <!-- <center><h1 class="h3 mb-2 text-gray-800">Request for Leave</h1></center><hr></hr> -->
	      <!-- <p class="mb-4">List of Employees.</p> -->

	      <!-- DataTales Example -->
	      <div class="card shadow mb-4">
	        <div class="card-header py-3">
	          <h6 class="m-0 font-weight-bold text-primary">Salary Slip for {{ $employee->firstname }} {{ $employee->lastname }} <span style="float: right;"> EmployeeID {{ $employee->employeeID }}</span></h6>
	        </div>
	        <div class="card-body">
	          <div class="table-responsive">
	          	<meta name="csrf-token" content="{{ csrf_token() }}" />
	            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	            	<thead>
	            		<tr>
	            			<th>Earnings</th>
	            			<th>Amount <small>(INR)</small></th>
	            			<th>Deducation</th>
	            			<th>Amount <small>(INR)</small></th>
	            		</tr>

	            	</thead>
	            	<tbody>
	           	
					<tr>
						<th>Basic</th>
						<td>{{ $employee->Basic }}</td>
						<!-- PF Deduction -->
						@if($employee->PF !=0)
							<?php $TotalDeducations = ($TotalDeducations + $employee->PF) ;?>
							<th>PF</th>
							<td>{{ $employee->PF }}</td>
						@endif
					</tr>
					<tr>
						<th>HRA</th>
						<td>{{ $employee->HRA }}</td>

						<!-- ESI Deduction -->
						@if($employee->ESI !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->ESI) ;?>
							<th>ESI</th>
							<td>{{ $employee->ESI }}</td>
						@endif
					</tr>

					@if($employee->Conveyance_Allowance != 0)
					<?php $TotalBaseEarning = ($TotalBaseEarning+$employee->Conveyance_Allowance);?>
					<tr>
						<th>Conveyance Allowance</th>
						<td>{{ $employee->Conveyance_Allowance }}</td>

						<!-- PT Deduction -->
						@if($employee->PT !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->PT) ;?>
							<th>PT</th>
							<td>{{ $employee->PT }}</td>
						@endif

					</tr>
					@else
						@if($employee->PT !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->PT) ;?>
						<tr><th></th><td></td>
							<th>PT</th>
							<td>{{ $employee->PT }}</td></tr>
						@endif

					@endif


					@if($employee->Medical_Allowance != 0)
					<?php $TotalBaseEarning = ($TotalBaseEarning+$employee->Medical_Allowance);?>
					<tr>	
						<th>Medical-Allowance</th>
						<td>{{$employee->Medical_Allowance}}</td>

						<!-- TDS Deduction -->
						@if($employee->TDS !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->TDS) ;?>
							<th>TDS</th>
							<td>{{ $employee->TDS }}</td>
						@endif
					</tr>
					@else
						@if($employee->TDS !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->TDS) ;?>
							<tr><th></th><td></td>
							<th>TDS</th>
							<td>{{ $employee->TDS }}</td></tr>
						@endif

					@endif

					@if($employee->LTA != 0)
					<?php $TotalBaseEarning = ($TotalBaseEarning+$employee->LTA);?>
					<tr>
						<th>LTA</th>
						<td>{{ $employee->LTA }}</td>

						<!-- Recoveries Deduction -->
						@if($employee->Recoveries !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->Recoveries) ;?>
							<th>Recoveries</th>
							<td>{{ $employee->Recoveries }}</td>
						@endif
					</tr>
					@else
						@if($employee->Recoveries !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->Recoveries) ;?>
							<tr><th></th><td></td>
							<th>Recoveries</th>
							<td>{{ $employee->Recoveries }}</td></tr>
						@endif
					@endif

					@if($employee->Other_Allowance != 0)
					<?php $TotalBaseEarning = ($TotalBaseEarning+$employee->Other_Allowance);?>
					<tr>
						<th>Other Allowance</th>
						<td>{{ $employee->Other_Allowance }}</td>

						<!-- Other  Deduction -->
						@if($employee->Other_Deduction !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->Other_Deduction) ;?>
							<th>Other_Deduction</th>
							<td>{{ $employee->Other_Deduction }}</td>
						@endif

					</tr>
					@else
						@if($employee->Other_Deduction !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->Other_Deduction) ;?>
						<tr><th></th><td></td>
							<th>Other_Deduction</th>
							<td>{{ $employee->Other_Deduction }}</td></tr>
						@endif
					@endif
						
					@if($employee->Referral_Bonus !=0)
					<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->Referral_Bonus) ;?>
					<tr>
						<th>Referral Bonus</th>
						<td>{{ $employee->Referral_Bonus }}</td>

						<!-- Medical_Insurance Deduction -->
						@if($employee->Medical_Insurance !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->Medical_Insurance) ;?>
							<th>Medical Insurance</th>
							<td>{{ $employee->Medical_Insurance }}</td>
						@endif

					</tr>
					@else
						@if($employee->Medical_Insurance !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->Medical_Insurance) ;?>
						<tr><th></th><td></td>
							<th>Medical Insurance</th>
							<td>{{ $employee->Medical_Insurance }}</td></tr>
						@endif
					@endif

					@if($employee->ASP_Share !=0)
					<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->ASP_Share) ;?>
					<tr>
						<th>ASP Share</th>
						<td>{{ $employee->ASP_Share }}</td>

						<!-- Loan_Recovery Deduction -->
						@if($employee->Loan_Recovery !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->Loan_Recovery) ;?>
							<th>Loan Recovery</th>
							<td>{{ $employee->Loan_Recovery }}</td>
						@endif

					</tr>
					@else
						@if($employee->Loan_Recovery !=0)
						<?php $TotalDeducations = ($TotalDeducations + $employee->Loan_Recovery) ;?>
							<tr><th></th><td></td>
							<th>Loan Recovery</th>
							<td>{{ $employee->Loan_Recovery }}</td></tr>
						@endif
					@endif

					@if($employee->Arrears !=0)
					<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->Arrears) ;?>
					<tr>
						<th>Arrears</th>
						<td>{{ $employee->Arrears }}</td>

					</tr>
					@endif

					@if($employee->Reimbursement !=0)
					<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->Reimbursement) ;?>
					<tr>
						<th>Reimbursement</th>
						<td>{{ $employee->Reimbursement }}</td>

					</tr>
					@endif

					@if($employee->Marriage_Bonus !=0)
					<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->Marriage_Bonus) ;?>
					<tr>
						<th>Marriage Bonus</th>
						<td>{{ $employee->Marriage_Bonus }}</td>

					</tr>
					@endif


					</tr>

					<tr>
						<td colspan="4" class="text-success"> Total Base Earnings <span style="float: right;"><small> INR </small>{{ $TotalBaseEarning }}</span></td>
					</tr>
					<tr>
						<td colspan="4" class="text-info"> Total Extra Earnings <span style="float: right;"><small> INR </small>{{ $TotalExtraEarning }}</span></td>
					</tr>
					<tr>
						<td colspan="4" class="text-warning"> Total Deductions <span style="float: right;"><small> INR </small>{{ $TotalDeducations }}</span></td>
					</tr>
					@if($LOP !=0)
					<?php 
						$PayPerDay = round(($TotalBaseEarning / $employee->Pay_Days));
						$LOPDeduction = round(($PayPerDay * $LOP));
					?>
					<tr>
						<td colspan="4" class="text-danger"> Loss of Pay  <span style="float: right;"><small> INR </small>{{$LOPDeduction}} ( {{ $LOP }} Day/s)</span> </td>
					</tr>
					@endif
					<?php 
						$NetPay = (($TotalBaseEarning+$TotalExtraEarning)-$TotalDeducations)-$LOPDeduction;
					?>
					<tr>
						<td colspan="4" class="text-success"><b>Net Pay <span style="float: right;"><small> INR </small>{{ $NetPay }}</span></b></td>
					</tr>
			        </tbody>

				</table>
	@endif
	</div>
	        </div>
	      </div>
	    </div>
@endforeach
@endsection()