<?php

//COMENT

require_once '../session.php';
require ("../function.php");
require ("../loanClass.php");

$apnumber = "";
$totalp = 0;
$totali = 0;

$rlinfolist=[];
$table = getLoanTableName("RCL");
$ptable = getLoanPrincipalTableName("RCL");
$itable = getLoanInterestTableName("RCL");
$rlinfolist = getLI($table, "", "", "", "l", $conn);
$rlinfo=[];

$rlinfolistcount = count($rlinfolist);
$rlinocounter = 0;
while($rlinocounter < $rlinfolistcount){
	$rlinfo = $rlinfolist[$rlinocounter];
	$dinumber = $rlinfo[1];
	$apnumber = $rlinfo[2];
	$totalp = $rlinfo[4];
	$totali = $rlinfo[6];

	$totalpp = totalPPaid($ptable,$apnumber,$conn);
	$totalip = totalIPaid($itable,$apnumber,$conn);

	$totalpd = $totalp - $totalpp;
	$totalid = $totali - $totalip;

	if($totalpd == 0 and $totalid == 0){
		updateLoanStatus($apnumber, $table, "Paid", $conn);
		echo $dinumber . " " . $apnumber . " RICE LOAN STATUS UPDATED\n";
	}else{
		//echo $apnumber. " NOT YET PAID\n";
	}

	$rlinocounter++;
}



?>


