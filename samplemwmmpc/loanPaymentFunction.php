<?php

function paymentCount($count, $amount){
	$counter=0;
	$amoun=0;
	$info=[];
	if($count > 0){
        $amount = $amount/$count;
        $counter = 1;
    }else{
        $counter = 0;
    }

    array_push($info, $amount);
    array_push($info, $counter);

    return($info);
}

function actualinterest($pint){
	$ai=0;
	$ai = $pint/100;
	return($ai);
}

function actualpterm($pterm, $modep){
	$mp=0;
	$pt=0;
	$aiinfo=[];

	if($modep == "Daily"){
        $pt = $pterm * 30;
        $mp = 30;
    }else if($modep == "Semi Monthly"){
        $pt = $pterm * 2;
        $mp = 2;
    }else if($modep == "Monthly"){
        $pt = $pterm * 1;  
        $mp = 1;
    }

    

    array_push($aiinfo, $pt);
    array_push($aiinfo, $mp);

    return($aiinfo);

}

function interestpaid($ci, $li, $cb, $lp, $pt){
	 //Current Interest Semi . Daily. Monthly
	$cir=0;
    $checkInterestP = ($ci + 1)%2;
    $checkInterestPI = ($ci + 1)%30;

    //Comute Interest
    if( ($checkInterestP == 0 and $pt == 2) or ($checkInterestPI != 1 and $ci!=0 and $pt == 30) ){
        $cir = $li;
    }else{
        $cir = ($cb * $lp)/$pt;
    }

    return($cir);
}

function updateLoanPaid($applicationnumber, $loantable, $dpaid, $conn){
    $sql = "UPDATE ";
    $sql.= $loantable; 
    $sql.= " SET date_paid = ";
    $sql.= $dpaid;
    $sql.= " WHERE loan_application_number =  '$applicationnumber' ";

    if ($conn->query($sql) === TRUE) {
       $infomessage = "Record updated successfully";
    } 
    else { 
          echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function updateLoanLastPayment($applicationnumber, $loantable, $lpayment, $conn){
    $sql = "UPDATE ";
    $sql.= $loantable; 
    $sql.= " SET last_payment = ";
    $sql.= $lpayment;
    $sql.= " WHERE loan_application_number =  '$applicationnumber' ";

    if ($conn->query($sql) === TRUE) {
       $infomessage = "Record updated successfully";
    } 
    else { 
          echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>