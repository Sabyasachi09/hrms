<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Salary Slip</title>
    <style>
        body {
            /*background: black;*/
            /*color: #fff;;*/
        }
        .sliptable table{
        	border-style: solid;
        	border-width: 0.5px;
        	padding: 3px;
        	font-size: 12.5px; 
        }

        .sliptable td{
        	/*border-style: solid;*/
        	padding: 5px 15px 0 15px;
        	border-left: 1px solid #000;
    		border-right: 1px solid #000;
    		font-size: 12.5px; 

        }
        .th1 {
        	border-style: solid;
        	border-width: 1px;
        	text-align: center;
        	border-left: 1px solid #000;
    		border-right: 1px solid #000;

        }
        .header1{
        	text-align: center;
        	font-style: bold;
        }
        .amount{
        	text-align: center;
        }

        .basicTable table{
        	border-style: none;
        	text-align: center;
        	font-size: 12.5px;
        }
        .basicTable tr{
        	font-size: 12.5px;
        }

        .basicTable td{
        	padding: 5px 15px 0 15px;
        	border-left: none;
    		border-right: none;
    		font-size: 12.5px;
        }
    </style>
</head>
<body>

	@foreach($PayRollData as $employee)
	@if($employee->Basic != 0)
	<?php 
		$TotalEarnings = 0;
		$TotalBaseEarning = 0;
		$TotalExtraEarning = 0;
		$TotalDeductions = 0;
		$LOPDeduction = 0;
		$NetPay = 0;
		$currentDayOfMonth=date('t');
		$LOP=($currentDayOfMonth - $employee->Pay_Days);
		$TotalBaseEarning = ($employee->Basic + $employee->HRA);

	?>
	<div class="div1">
      	<meta name="csrf-token" content="{{ csrf_token() }}" />
      	<div class="header1">
        	<b>TENVIC SPORTS EDUCATION PRIVATE LIMITED</b><br>
			<b>No. 530, 22nd Cross, 13th Main Road, Banashankari 2nd Stage, Bangalore - 560070</b><br>
			<b>Pay slip for the month of <?php echo date('M').'/'.date('Y'); ?></b></br>
      	</div><br><br>
      	<center>
      		<table width="100%" class="basicTable">
      			<tbody>
      				<tr class="basicTable">
      					<td>Employee ID : </td>
      					<td>{{ $employee->employeeID }}</td>
      					<td>Employee Name : </td>
      					<td>{{ $employee->firstname.' '.$employee->lastname }}</td>
      				</tr>
      				<tr class="basicTable">
      					<td>Pay Days : </td>
      					<td>{{ $employee->Pay_Days }}</td>
      					<td>Present Days : </td>
      					<td>{{ $employee->Present_Days }}</td>
      				</tr>
      				<tr class="basicTable">
      					<td>A/C No : </td>
      					<td>{{ $employee->salary_ac }}</td>
      					<td>PAN : </td>
      					<td>{{ $employee->pan_number }}</td>
      				</tr>
      				<tr class="basicTable">
      					<td>UAN : </td>
      					<td>{{ $employee->uan }}</td>
      					<td></td>
      					<td></td>
      				</tr>
      			</tbody>
      		</table>
      	</center>
	          	 <br>

        <table width="100%" cellspacing="0" class="sliptable">
        	<thead>
        		<tr>
        			<th class="th1">Earnings</th>
        			<th class="th1">Amount <small>(INR)</small></th>
        			<th class="th1">Deductions</th>
        			<th class="th1">Amount <small>(INR)</small></th>
        		</tr>

        	</thead>
        	<tbody>
       	
			<tr>
				<td>Basic</td>
				<td class="amount">{{ moneyFormatIndia($employee->Basic) }}</td>
				<!-- PF Deduction -->
				@if($employee->PF !=0)
					<?php $TotalDeductions = ($TotalDeductions + $employee->PF) ;?>
					<td>PF</td>
					<td class="amount">{{ moneyFormatIndia($employee->PF) }}</td>
				@endif
			</tr>
			<tr>
				<td>HRA</td>
				<td class="amount">{{ moneyFormatIndia($employee->HRA) }}</td>

				<!-- ESI Deduction -->
				@if($employee->ESI !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->ESI) ;?>
					<td>ESI</td>
					<td class="amount">{{ moneyFormatIndia($employee->ESI) }}</td>
				@endif
			</tr>

			@if($employee->Conveyance_Allowance != 0)
			<?php $TotalBaseEarning = ($TotalBaseEarning+$employee->Conveyance_Allowance);?>
			<tr>
				<td>Conveyance Allowance</td>
				<td class="amount">{{ moneyFormatIndia($employee->Conveyance_Allowance) }}</td>

				<!-- PT Deduction -->
				@if($employee->PT !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->PT) ;?>
					<td>PT</td>
					<td class="amount">{{ moneyFormatIndia($employee->PT) }}</td>
				@endif

			</tr>
			@else
				@if($employee->PT !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->PT) ;?>
				<tr><td></td><td></td>
					<td>PT</td>
					<td class="amount">{{ moneyFormatIndia($employee->PT) }}</td></tr>
				@endif

			@endif


			@if($employee->Medical_Allowance != 0)
			<?php $TotalBaseEarning = ($TotalBaseEarning+$employee->Medical_Allowance);?>
			<tr>	
				<td>Medical-Allowance</td>
				<td class="amount">{{ moneyFormatIndia($employee->Medical_Allowance) }}</td>

				<!-- TDS Deduction -->
				@if($employee->TDS !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->TDS) ;?>
					<td>TDS</td>
					<td class="amount">{{ moneyFormatIndia($employee->TDS) }}</td>
				@endif
			</tr>
			@else
				@if($employee->TDS !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->TDS) ;?>
					<tr><td></td><td></td>
					<td>TDS</td>
					<td class="amount">{{ moneyFormatIndia($employee->TDS) }}</td></tr>
				@endif

			@endif

			@if($employee->LTA != 0)
			<?php $TotalBaseEarning = ($TotalBaseEarning+$employee->LTA);?>
			<tr>
				<td>LTA</td>
				<td class="amount">{{ moneyFormatIndia($employee->LTA) }}</td>

				<!-- Recoveries Deduction -->
				@if($employee->Recoveries !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->Recoveries) ;?>
					<td>Recoveries</td>
					<td class="amount">{{ moneyFormatIndia($employee->Recoveries) }}</td>
				@endif
			</tr>
			@else
				@if($employee->Recoveries !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->Recoveries) ;?>
					<tr><td></td><td></td>
					<td>Recoveries</td>
					<td class="amount">{{ moneyFormatIndia($employee->Recoveries) }}</td></tr>
				@endif
			@endif

			@if($employee->Other_Allowance != 0)
			<?php $TotalBaseEarning = ($TotalBaseEarning+$employee->Other_Allowance);?>
			<tr>
				<td>Other Allowance</td>
				<td class="amount">{{ moneyFormatIndia($employee->Other_Allowance) }}</td>

				<!-- Other  Deduction -->
				@if($employee->Other_Deduction !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->Other_Deduction) ;?>
					<td>Other Deductions</td>
					<td class="amount">{{ moneyFormatIndia($employee->Other_Deduction) }}</td>
				@endif

			</tr>
			@else
				@if($employee->Other_Deduction !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->Other_Deduction) ;?>
				<tr><td></td><td></td>
					<td>Other Deductions</td>
					<td class="amount">{{ moneyFormatIndia($employee->Other_Deduction) }}</td></tr>
				@endif
			@endif
				
			@if($employee->Referral_Bonus !=0)
			<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->Referral_Bonus) ;?>
			<tr>
				<td>Referral Bonus</td>
				<td class="amount">{{ moneyFormatIndia($employee->Referral_Bonus) }}</td>

				<!-- Medical_Insurance Deduction -->
				@if($employee->Medical_Insurance !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->Medical_Insurance) ;?>
					<td>Medical Insurance</td>
					<td class="amount">{{ moneyFormatIndia($employee->Medical_Insurance) }}</td>
				@endif

			</tr>
			@else
				@if($employee->Medical_Insurance !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->Medical_Insurance) ;?>
				<tr><td></td><td></td>
					<td>Medical Insurance</td>
					<td class="amount">{{ moneyFormatIndia($employee->Medical_Insurance) }}</td></tr>
				@endif
			@endif

			@if($employee->ASP_Share !=0)
			<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->ASP_Share) ;?>
			<tr>
				<td>ASP Share</td>
				<td class="amount">{{ moneyFormatIndia($employee->ASP_Share) }}</td>

				<!-- Loan_Recovery Deduction -->
				@if($employee->Loan_Recovery !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->Loan_Recovery) ;?>
					<td>Loan Recovery</td>
					<td class="amount">{{ moneyFormatIndia($employee->Loan_Recovery) }}</td>
				@endif

			</tr>
			@else
				@if($employee->Loan_Recovery !=0)
				<?php $TotalDeductions = ($TotalDeductions + $employee->Loan_Recovery) ;?>
					<tr><td></td><td></td>
					<td>Loan Recovery</td>
					<td class="amount">{{ moneyFormatIndia($employee->Loan_Recovery) }}</td></tr>
				@endif
			@endif

			@if($employee->Arrears !=0)
			<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->Arrears) ;?>
			<tr>
				<td>Arrears</td>
				<td class="amount">{{ moneyFormatIndia($employee->Arrears) }}</td>
				<td></td><td></td>

			</tr>
			@endif

			@if($employee->Reimbursement !=0)
			<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->Reimbursement) ;?>
			<tr>
				<td>Reimbursement</td>
				<td class="amount">{{ moneyFormatIndia($employee->Reimbursement) }}</td>
				<td></td><td></td>
			</tr>
			@endif

			@if($employee->Marriage_Bonus !=0)
			<?php $TotalExtraEarning = ($TotalExtraEarning + $employee->Marriage_Bonus) ;?>
			<tr>
				<td>Marriage Bonus</td>
				<td class="amount">{{ moneyFormatIndia($employee->Marriage_Bonus) }}</td>
				<td></td><td></td>
			</tr>
			@endif

			</tr>

			<tr><td></td><td></td><td></td><td></td></tr>
			<tr>
				<th class="th1">Total</th>
				<th class="th1">{{ moneyFormatIndia($TotalBaseEarning+$TotalExtraEarning) }}</th>
				<th class="th1">Total</th>
				<th class="th1">{{ moneyFormatIndia($TotalDeductions) }}</th>

			</tr>
			<tr><td colspan="4"><br></td></tr>
			<tr>
				<td colspan="4" class="text-success"><b> Total Base Earnings </b><span style="float: right;"><small> INR </small><b>{{ moneyFormatIndia($TotalBaseEarning) }}</b></span></td>
			</tr>
			<tr>
				<td colspan="4" class="text-info"><b> Total Extra Earnings</b> <span style="float: right;"><small> INR </small><b>{{ moneyFormatIndia($TotalExtraEarning) }}</b></span></td>
			</tr>
			<tr>
				<td colspan="4" class="text-warning"> <b>Total Deductions</b> <span style="float: right;"><small> INR </small><b>{{ moneyFormatIndia($TotalDeductions) }}</b></span></td>
			</tr>
			@if($LOP !=0)
			<?php 
				$PayPerDay = round(($TotalBaseEarning / $employee->Pay_Days));
				$LOPDeduction = round(($PayPerDay * $LOP));
			?>
			<tr>
				<td colspan="4" class="text-danger"><b> Loss of Pay ( {{ $LOP }} Day/s )</b>  <span style="float: right;"><small> INR </small><b>{{moneyFormatIndia($LOPDeduction)}}</b> </span></td>
			</tr>
			@endif
			<?php 
				$NetPay = (($TotalBaseEarning+$TotalExtraEarning)-$TotalDeductions)-$LOPDeduction;
			?>
			<tr><td colspan="4"><br><hr></hr></td></tr>
			<tr>
				<td colspan="4" class="text-success"><strong>Net Pay </strong><span style="float: right;"><small> INR </small><b>{{ moneyFormatIndia($NetPay) }}</b></span></td>
			</tr>
			<tr>
				<td colspan="4" class="text-success"><strong>Net Pay in Words </strong><span style="float: right;"><b>{{ convertToIndianCurrency($NetPay) }}</b></span></td>
			</tr>
			<tr><td colspan="4"><br><hr></hr></td></tr>
			<tr><td colspan="4"><br><br></td></tr>
			<tr>
				<td colspan="4"><span style="float: right;"><b>Authorized Signatory</b></span></td>
			</tr>
			<tr><td colspan="4"><br><br></td></tr>
	        </tbody>
		</table>
				
	@endif
	    </div>
@endforeach

</body>
</html>

<?php 

	
	function convertToIndianCurrency($number) {
    $no = round($number);
    $decimal = round($number - ($no = floor($number)), 2) * 100;    
    $digits_length = strlen($no);    
    $i = 0;
    $str = array();
    $words = array(
        0 => '',
        1 => 'One',
        2 => 'Two',
        3 => 'Three',
        4 => 'Four',
        5 => 'Five',
        6 => 'Six',
        7 => 'Seven',
        8 => 'Eight',
        9 => 'Nine',
        10 => 'Ten',
        11 => 'Eleven',
        12 => 'Twelve',
        13 => 'Thirteen',
        14 => 'Fourteen',
        15 => 'Fifteen',
        16 => 'Sixteen',
        17 => 'Seventeen',
        18 => 'Eighteen',
        19 => 'Nineteen',
        20 => 'Twenty',
        30 => 'Thirty',
        40 => 'Forty',
        50 => 'Fifty',
        60 => 'Sixty',
        70 => 'Seventy',
        80 => 'Eighty',
        90 => 'Ninety');
    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
    while ($i < $digits_length) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
            $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
        } else {
            $str [] = null;
        }  
    }
    
    $Rupees = implode(' ', array_reverse($str));
    $paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
    return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
}

function moneyFormatIndia($num) {
    $explrestunits = "" ;
    if(strlen($num)>3) {
        $lastthree = substr($num, strlen($num)-3, strlen($num));
        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
        $expunit = str_split($restunits, 2);
        for($i=0; $i<sizeof($expunit); $i++) {
            // creates each of the 2's group and adds a comma to the end
            if($i==0) {
                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
            } else {
                $explrestunits .= $expunit[$i].",";
            }
        }
        $thecash = $explrestunits.$lastthree;
    } else {
        $thecash = $num;
    }
    return $thecash; // writes the final format where $currency is the currency symbol.
}

 
?>

