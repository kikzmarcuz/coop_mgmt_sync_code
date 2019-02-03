<?php
include '../database/dbconnection.php';

//SD
function getSDBal($memid){
  $conn = dbconnection();

  $totalAS = 0;
  $totalSD = 0;
  $totalSW = 0;
  $sqlSD = "SELECT amount FROM savings_table WHERE id_number = '$memid' and (type_transaction = 'Deposit' or type_transaction = 'Retention' or type_transaction = 'Interest')";
  $resultSD = $conn->query($sqlSD);
  
  if($resultSD->num_rows > 0){
    while ($row = mysqli_fetch_array($resultSD)) {
      $totalSD = $totalSD + $row['amount'];
    }
  }else{
    $totalSD = 0;
  }

  $sqlSW = "SELECT amount FROM savings_table WHERE id_number = '$memid' and type_transaction = 'Withdraw' ";
  $resultSW = $conn->query($sqlSW);
  
  if($resultSW->num_rows > 0){
    while ($row = mysqli_fetch_array($resultSW)) {
      $totalSW = $totalSW + $row['amount'];
    }
  }else{
    $totalSW = 0;
  }

  $totalAS = $totalSD - $totalSW;

  return($totalAS);
}

function getSDData($mid, $searchobj){
	$conn = dbconnection();
	$arr=[];
	$arrl=[];
	
	$sqlSDL = "SELECT * FROM savings_table WHERE id_number = '$mid' order by date_transaction asc";
	$resultSDL = $conn->query($sqlSDL);
	if($resultSDL->num_rows > 0){
	    while ($row = mysqli_fetch_array($resultSDL)) {
	        $arr[0] = $row['transaction_number'];
	        $arr[1] = $row['id_number'];
	        $arr[2] = $row['type_transaction'];
	        $arr[3] = $row['type_savings'];
	        $arr[4] = $row['voucher_number'];
	        $arr[5] = $row['reference_number'];
	        $arr[6] = $row['amount'];
	        $arr[7] = $row['term'];
	        $arr[8] = $row['date_transaction'];
	        $arr[9] = $row['encoded_by'];
	        array_push($arrl, $arr);
	    }

	    if($searchobj == "l"){
			return($arrl);
		}else if($searchobj == "i"){
			return($arr);
		}else{
			return($arr[$searchobj]);
		}
	}
}

//SC
function getSCBal($memid){
	$totalSC = 0;
    $totalASC = 0;

    $sqlSC = "SELECT amount FROM share_capital_table WHERE id_number = '$idNumber' and (type_transaction = 'BSC' or type_transaction = 'Retention' or type_transaction = 'CBU' or type_transaction = 'SCF' or type_transaction = 'Recruit')";
    $resultSC = $conn->query($sqlSC);
  
  	if($resultSC->num_rows > 0){
      	while ($row = mysqli_fetch_array($resultSC)) {
          	$totalSC = $totalSC + $row['amount'];
      	}
  	}else{
          	$totalSC = 0;
  	}

  	$sqlSCW = "SELECT amount FROM share_capital_table WHERE id_number = '$idNumber' and type_transaction = 'Withdraw' ";
  	$resultSCW = $conn->query($sqlSCW);
  
  	if($resultSCW->num_rows > 0){
      	while ($row = mysqli_fetch_array($resultSCW)) {
          	$totalSCW = $totalSCW + $row['amount'];
      	}
  	}else{
          	$totalSCW = 0;
  	}

  	$totalASC = $totalSC - $totalSCW;
  	return($totalASC);
}

function getSCData($mid, $searchobj){
	$sqlSDL = "SELECT * FROM share_capital_table WHERE id_number = '$idNumber' order by date_transaction asc";
	$resultSDL = $conn->query($sqlSDL);
	$numRowSC = mysqli_num_rows($resultSDL);
	$counterSC = 0;
	$checkVReferenceSC = "";
	$checkOReferenceSC = "";
	$actualSCBalanceTemp = 0;
  
  	if($resultSDL->num_rows > 0){
      while ($row = mysqli_fetch_array($resultSDL)) {
      	$arr[0] = $row['transaction_number'];
        $arr[1] = $row['id_number'];
        $arr[2] = $row['type_transaction'];
        $arr[3] = $row['voucher_number'];
        $arr[4] = $row['reference_number'];
        $arr[5] = $row['amount'];
        $arr[6] = $row['date_transaction'];
        $arr[7] = $row['encoded_by'];

        $transactionNumberSC[$counterSC] = $row['transaction_number'];
        $typeTransactionSC[$counterSC] = $row['type_transaction'];
        $transactionNumberSC[$counterSC] = $row['transaction_number'];
        $checkVReferenceSC = $row['voucher_number'];
        $checkOReferenceSC = $row['reference_number'];

        if($searchobj == "l"){
			return($arrl);
		}else if($searchobj == "i"){
			return($arr);
		}else{
			return($arr[$searchobj]);
		}

      }
  	}
}


function executedb($query){
	$conn = dbconnection();
	$returnres = $conn->query($query);
	return($returnres);
}