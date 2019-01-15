<?php

function totalPPaid($table ,$apnumber, $conn){
	$tt=0;
	$sqllps = "SELECT * FROM ";
	$sqllps.= $table;
	$sqllps.= " WHERE loan_application_number = '$apnumber'  ";
	$resultlps = $conn->query($sqllps);

    if($resultlps->num_rows > 0){
      while ($rowlps = mysqli_fetch_array($resultlps)) {
        $totalPrincipalPayment = $rowlps['amount'];
        $tt = $tt + $totalPrincipalPayment;
      }
	 }
	return($tt);
}

function totalIPaid($table ,$apnumber, $conn){
 	$ti = 0;
 	$sqllps = "SELECT * FROM ";
	$sqllps.= $table;
	$sqllps.= " WHERE loan_application_number = '$apnumber'  ";
	$resultlps = $conn->query($sqllps);

    if($resultlps->num_rows > 0){
      while ($rowlps = mysqli_fetch_array($resultlps)) {
        $totalPrincipalPayment = $rowlps['interest_revenue'];
        $ti = $ti + $totalPrincipalPayment;
      }
	 }
 	return($ti);   
}


?>