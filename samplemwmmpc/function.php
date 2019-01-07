<?php  

//TABLE
//TRIAL
function getTableName($typepayment){
  $tablename = "";
  if($typepayment == "OI"){
    $tablename = "other_income_table";
  }else if($typepayment == "SC"){
    $tablename = "share_capital_table";
  }else if($typepayment == "CRP"){
    $tablename = "cashier_report_table";
  }else if($typepayment == "CRW"){
    $tablename = "cashier_withdraw_table";
  }else if($typepayment == "RCC"){
    $tablename = "rice_cash_revenue_table";
  }else if($typepayment == "CR"){
    $tablename = "cashier_report_table";
  }else if($typepayment == "CD"){
    $tablename = "disbursement_table";
  }else if($typepayment == "JE"){
    $tablename = "journal_report_table";
  }else if($typepayment == "AC"){
    $tablename = "chart_account_entry_table";
  }
  return($tablename);
}

function getLoanTableName($typeloan){
	$loantable = "";

	if($typeloan == "BL"){
        $loantable = "bl_loan_table";
    }else if($typeloan == "CLL"){
        $loantable = "cll_loan__table";
    }else if($typeloan == "RL"){
        $loantable = "rl_loan_table";
    }else if($typeloan == "EDL"){
        $loantable = "edl_loan_table";
    }else if($typeloan == "PL"){
        $loantable = "pl_loan_table";
    }else if($typeloan == "CKL"){
        $loantable = "ckl_loan_table";
    }else if($typeloan == "CL"){
        $loantable = "cl_loan_table";
    }else if($typeloan == "SL"){
        $loantable = "sl_loan_table";
    }else if($typeloan == "EML"){
        $loantable = "eml_loan_table";
    }else if($typeloan == "RCL"){
        $loantable = "rice_loan_table";
    }

    return($loantable);
}

function getLoanPrincipalTableName($typeloan){
	$loantable = "";

	if($typeloan == "BL"){
        $loantable = "bl_loan_payment_table";
    }else if($typeloan == "CLL"){
        $loantable = "cll_loan_payment_table";
    }else if($typeloan == "RL"){
        $loantable = "rl_loan_payment_table";
    }else if($typeloan == "EDL"){
        $loantable = "edl_loan_payment_table";
    }else if($typeloan == "PL"){
        $loantable = "pl_loan_payment_table";
    }else if($typeloan == "CKL"){
        $loantable = "ckl_loan_payment_table";
    }else if($typeloan == "CL"){
        $loantable = "cl_loan_payment_table";
    }else if($typeloan == "SL"){
        $loantable = "sl_loan_payment_table";
    }else if($typeloan == "EML"){
        $loantable = "eml_loan_payment_table";
    }else if($typeloan == "RCL"){
        $loantable = "rice_loan_payment_table";
    }

    return($loantable);
}

function getLoanInterestTableName($typeloan){
	$loantable = "";

	if($typeloan == "BL"){
        $loantable = "bl_credit_revenue_table";
    }else if($typeloan == "CLL"){
        $loantable = "cll_credit_revenue_table";
    }else if($typeloan == "RL"){
        $loantable = "rl_credit_revenue_table";
    }else if($typeloan == "EDL"){
        $loantable = "edl_credit_revenue_table";
    }else if($typeloan == "PL"){
        $loantable = "pl_credit_revenue_table";
    }else if($typeloan == "CKL"){
        $loantable = "ckl_credit_revenue_table";
    }else if($typeloan == "CL"){
        $loantable = "cl_credit_revenue_table";
    }else if($typeloan == "SL"){
        $loantable = "sl_credit_revenue_table";
    }else if($typeloan == "EML"){
        $loantable = "eml_credit_revenue_table";
    }else if($typeloan == "RCL"){
        $loantable = "rice_credit_revenue_table";
    }

    return($loantable);
}

function getDepositTable($type){
  $tablename = "";

  if($type == "SD"){
    $tablename = "savings_table";
  }else if($type == "TD"){
    $tablename = "time_deposit_table";
  }else if($type == "FD"){
    $tablename = "fixed_deposit_table";
  }else if($type == "CD"){
    $tablename = "special_deposit_table";
  }

  return($tablename);
}

//TRANSACTION
function getLoanTransactionCode($arr){
  $tc="";
  if($arr[0] == 1){
    $tc = "BL";
  }else if($arr[1] == 1){
    $tc = "CLL";
  }else if($arr[2] == 1){
    $tc = "CML";
  }else if($arr[3] == 1){
    $tc = "EDL";
  }else if($arr[4] == 1){
    $tc = "RL";
  }else if($arr[5] == 1){
    $tc = "PL";
  }else if($arr[6] == 1){
    $tc = "CL";
  }else if($arr[7] == 1){
    $tc = "CKL";
  }else if($arr[8] == 1){
    $tc = "EML";
  }else if($arr[9] == 1){
    $tc = "SL";
  }else if($arr[10] == 1){
    $tc = "RCL";
  }else{
    $tc = "PD";
  }
  return($tc);
}

function getDepositTransactionCode($arr){
  $tc="";
  if($arr[0] == 1){
    $tc = "SD";
  }else if($arr[1] == 1){
    $tc = "TD";
  }else if($arr[2] == 1){
    $tc = "FD";
  }else if($arr[3] == 1){
    $tc = "CD";
  }else{
    $tc = "PD";
  }
  return($tc);
}

function getOtherTransactionCode($arr){
  $tc="";
  if($arr[0] == 1){
    $tc = "PNL";
  }else if($arr[1] == 1){
    $tc = "TD";
  }else if($arr[2] == 1){
    $tc = "FD";
  }else if($arr[3] == 1){
    $tc = "CD";
  }else{
    $tc = "PD";
  }
  return($tc);
}

function getColumnReportFlag($code, $conn){
  $col = "";
  if($code == "SD"){
    $col = "sd";
  }elseif ($code == "TD"){
    $col = "td";
  }elseif ($code == "FD"){
    $col = "fd";
  }elseif ($code == "CD"){
    $col = "cd";
  }elseif ($code == "SC"){
    $col = "sc";
  }elseif ($code == "AC"){
    $col = "ac";
  }

  return($col);
}

//DB FUNCTION
function generateJN($conn){
  $referencenumberTemp="";
  $sqlOR = "SELECT * FROM `journal_report_table` WHERE journal_number_temp=(SELECT MAX(journal_number_temp) FROM `journal_report_table`)";
  $resultOR = $conn->query($sqlOR);

  if($resultOR->num_rows > 0){
      //echo "string";
      while ($row = mysqli_fetch_array($resultOR)) {
          # code...
          $referencenumberTemp = $row['journal_number_temp'] + 1;
      }
  }else{
      $referencenumberTemp = 1;
  }

  return($referencenumberTemp);
}

function deleteLoanPaymentD($pnametable, $inametable, $referencenumber, $idnumber ,$conn){

	$sqlLP1 = "DELETE FROM  ";
	$sqlLP1 .= "$pnametable";
    $sqlLP1 .= " WHERE reference_number = '$referencenumber' and id_number = '$idnumber' ";
    $resultLP1 = $conn->query($sqlLP1);


    $sqlLP2 = "DELETE FROM  ";
	$sqlLP2 .= $inametable; 
    $sqlLP2 .= " WHERE reference_number = '$referencenumber' and id_number = '$idnumber' ";
    $resultLP2 = $conn->query($sqlLP2);

    if ($conn->query($sqlLP1) === TRUE and $conn->query($sqlLP2) === TRUE) {
       $infomessage = "Record updated successfully";
       //echo "$infomessage";
    }else { 
        echo "Error: " . $sqlLP1 . "<br>" . $conn->error;
        echo "Error: " . $sqlLP2 . "<br>" . $conn->error;
    }
}

function deleteLoanPaymentF($pnametable, $referencenumber, $idnumber ,$conn){
    $sqlLP2 = "DELETE FROM  ";
	  $sqlLP2 .= $pnametable; 
    $sqlLP2 .= " WHERE reference_number = '$referencenumber' and id_number = '$idnumber' ";
    $resultLP2 = $conn->query($sqlLP2);

    if ($conn->query($sqlLP2) === TRUE) {
       $infomessage = "Record updated successfully";
       //echo "$infomessage";
    }else { 
        echo "Error: " . $sqlLP2 . "<br>" . $conn->error;
    }
}

function deleteOtherPayment($nametable, $referencenumber, $idnumber ,$conn){
	$sqlLP1 = "DELETE FROM  ";
	$sqlLP1 .= $nametable; 
  $sqlLP1 .= " WHERE reference_number = '$referencenumber' and id_number = '$idnumber' ";
  $resultLP1 = $conn->query($sqlLP1);

  if ($conn->query($sqlLP1) === TRUE) {
     $infomessage = "Record updated successfully";
  }else { 
        echo "Error: " . $sqlLP1 . "<br>" . $conn->error;
  }
}

//SEARCH
function seaarchAllMember($conn){
  $arr[] = "";
  $arrcontainer[] = "";
  $arrcounter = 0;
  $sqlSearchName = "SELECT * FROM name_table WHERE (member_status != 'Resigned' and member_status != 'Diseased' ) ";
        $resultSearchName = $conn->query($sqlSearchName);

    if($resultSearchName->num_rows > 0){
        while($row = mysqli_fetch_array($resultSearchName)){
          $arr[0] = $row['id_number'];
          $arr[1] = $row['account_number'];
          $arr[2] = $row['first_name'];
          $arr[3] = $row['middle_name'];
          $arr[4] = $row['last_name'];

          $arrcontainer[$arrcounter] = $arr;
          $arrcounter++;
         }
    }

  return($arrcounter);
}

function seaarchMember($id, $seaarhobj, $conn){
  $arr[] = "";
  $sqlSearchName = "SELECT * FROM name_table WHERE (CONCAT(first_name, ' ', last_name) LIKE '%$id%' OR last_name LIKE '%$id%' or  id_number = '$id') and  (member_status != 'Resigned' and member_status != 'Diseased' ) ";
        $resultSearchName = $conn->query($sqlSearchName);

    if($resultSearchName->num_rows > 0){
        while($row = mysqli_fetch_array($resultSearchName)){
          $arr[0] = $row['id_number'];
          $arr[1] = $row['account_number'];
          $arr[2] = $row['first_name'];
          $arr[3] = $row['middle_name'];
          $arr[4] = $row['last_name'];
         }
    }

    if($seaarhobj == 0){
      return($arr[0]);
    }else if($seaarhobj == 1){
      return($arr[1]);
    }else if($seaarhobj == 2){
      return($arr[2]);
    }else if($seaarhobj == 3){
      return($arr[3]);
    }else if($seaarhobj == 4){
      return($arr[4]);
    }else if($seaarhobj == 5){
      return($arr);
    }
}

//UPDATE
function updateDeposit($table, $arr, $id, $type ,$conn){
	$sql5 = "UPDATE time_deposit_table SET
	withdraw_td = '1',
	voucher_number = '$arr[0]',
	withraw_amount = '$arr[1]',
	date_withdraw = '$arr[2]',
	encoded_by_withdraw = '$arr[3]'
	WHERE id_number = '$id' and type_savings = '$type' ";

	if ($conn->query($sql5) === TRUE) {
	  return(true);
	} 
	else{ 
	  echo "Error: " . $sql5 . "<br>" . $conn->error;
	  return(false);
	}
}

function updateTransactionReport($table, $codenumber, $referencenumber, $col ,$conn){
  //reference_number
  $sql5 = "UPDATE "; 
  $sql5 .= $table;
  $sql5 .= " SET ";
  $sql5 .= $col; 
  $sql5 .= "= '1'";
  $sql5 .= " WHERE id_number = '$codenumber' and reference_number = $referencenumber ";

  if ($conn->query($sql5) === TRUE) {
    return(true);
  } 
  else{
    echo "Error: " . $sql5 . "<br>" . $conn->error; 
    return(false);
  }
}

function updateLoanStatus($applicationnumber, $loantable ,$conn){
  $sql = "UPDATE ";
  $sql.= $loantable; 
  $sql.= " SET loan_status = 'Released' WHERE loan_application_number =  '$applicationnumber' ";

    if ($conn->query($sql) === TRUE) {
       $infomessage = "Record updated successfully";
    } 
    else { 
          echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//POST
function postShareCapital($arr, $conn){
	$sql4 = "INSERT INTO share_capital_table(id_number, type_transaction,voucher_number,amount, date_transaction, encoded_by) 
        VALUES ('$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]', '$arr[4]', '$arr[5]')";

    if ($conn->query($sql4) === TRUE) {
        return(true);
    }else { 
        return(false);
    }
}

function postTransactionReport($table, $arr, $conn){
	$sql5 = "INSERT INTO ";
	$sql5 .= $table;
	$sql5 .= "(id_number, reference_number, date_transaction, encoded_by) 
         VALUES ('$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]')";

    if ($conn->query($sql5) === TRUE) {
    	return(true);
  	}else { 
  		echo "Error: " . $sql5 . "<br>" . $conn->error;
    	return(false);
  	}
}

function postAccountEntry($arr, $conn){
  $sql5 = "INSERT INTO chart_account_entry_table(transaction_type, expenses_type, expenses_category,  cr_dr, amount, voucher_number, Remarks , date_transaction, encoded_by) 
          VALUES ('$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]', '$arr[4]', '$arr[5]', '$arr[6]', '$arr[7]', '$arr[8]')";

      if ($conn->query($sql5) === TRUE) {
        return(true);
      } 
      else { 
        echo "Error: " . $sql5 . "<br>" . $conn->error;
        return(false);
      }
}

function postAccountEntryE($arr, $conn){
  $sql5 = "INSERT INTO chart_account_entry_table(transaction_type, expenses_type, expenses_category, account_expense,  cr_dr, amount, voucher_number, Remarks , date_transaction, encoded_by) 
          VALUES ('$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]', '$arr[4]', '$arr[5]', '$arr[6]', '$arr[7]', '$arr[8]', '$arr[9]')";

      if ($conn->query($sql5) === TRUE) {
        return(true);
      } 
      else { 
        echo "Error: " . $sql5 . "<br>" . $conn->error;
        return(false);
      }
}

function postLoanPayment($pnametable, $inametable, $arr , $arr2 ,$conn){
  $sql1 = "INSERT INTO ";
  $sql1 .= $pnametable;
  $sql1 .= "(id_number, reference_number, loan_application_number, amount , date_payment, encoded_by, payment_count) 
         VALUES ('$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]', '$arr[4]', '$arr[5]', '$arr[6]')";

  $sql2 = "INSERT INTO ";
  $sql2 .= $inametable;
  $sql2 .= "(id_number, reference_number, loan_application_number, interest_revenue, date_transaction, encoded_by, payment_count) 
         VALUES ('$arr2[0]', '$arr2[1]', '$arr2[2]', '$arr2[3]', '$arr2[4]', '$arr2[5]', '$arr2[6]')";

  if ($conn->query($sql1) === TRUE and $conn->query($sql2) === TRUE) {
    return(true);
  }else { 
    echo "Error: " . $sql1  . $sql2 . "<br>" . $conn->error;
    return(false);
  }
}


//GET
function getLoanPaymentStatus($table, $ppayment, $applicationnumber, $conn){
  $loanstatus="";
  $balance=0;
  $totalPrincipalPayment=0;

  $sqllps = "SELECT * FROM ";
  $sqllps.= $table;
  $sqllps.= " WHERE loan_application_number = '$applicationnumber'  ";
  $resultlps = $conn->query($sqllps);

  if($resultlps->num_rows > 0){
    while ($rowlps = mysqli_fetch_array($resultlps)) {
      $totalPrincipalPayment = $rowlps['amount'];
      $balance = $balance + $totalPrincipalPayment;
    }
  }

  $balance = $balance-$ppayment;
  if($balance == 0){
    $loanstatus = "Paid";
  }
  return($loanstatus);
}

function getLoanStatus($applicationnumber, $loantable ,$conn){
  $loanstatus = "";
  $sqlName = "SELECT * FROM ";
  $sqlName.= $loantable;
  $sqlName.= " WHERE loan_application_number = '$applicationnumber'  ";

  $resultName = $conn->query($sqlName);

  if($resultName->num_rows > 0){
      while ($row = mysqli_fetch_array($resultName)) {
          $loanstatus = $row['loan_status'];
      }
  }
  return($loanstatus);
}

function getApplicationNumberP($ornumber, $ploantable ,$conn){
    $loanan = "";

    $sqlName = "SELECT * FROM ";
    $sqlName.= $ploantable;
    $sqlName.= " WHERE reference_number = '$ornumber'  ";

    $resultName = $conn->query($sqlName);

    if($resultName->num_rows > 0){
        while ($row = mysqli_fetch_array($resultName)) {
            $loanan= $row['loan_application_number'];
        }
    }

    return($loanan);
}

function getDepositID($table, $id, $seaarhobj, $ts, $conn){
  $arr=[];
  $arrcontainer=[];
  $retarr=[];
  

  $sqlbi = "SELECT * FROM "; 
  $sqlbi .= $table;
  $sqlbi .= " WHERE id_number = '$id' and withdraw_td = 0 ";
    $resultbi = $conn->query($sqlbi);
    $numRowTD = mysqli_num_rows($resultbi);
    
    if($resultbi->num_rows > 0){
      while ($row = mysqli_fetch_array($resultbi)) {
          $arr[0] = $row['type_savings'];
          $arr[1] = $row['amount']; 

          if($ts == 0){
            $retarr = $arr;
          }else if($ts == 1){
            array_push($arrcontainer, $arr);
            $retarr = $arrcontainer;
          }
      }
      return($retarr);
    }else{
      return($retarr);
    }
}

function invoiceNotExist($invoice, $conn){
  $loanan = "";

    $sqlName = "SELECT * FROM rice_loan_table WHERE invoice_number = '$invoice' ";
    $resultName = $conn->query($sqlName);

    if($resultName->num_rows > 0){
        return(false);
    }else{
      return(true);
    }
}

//TBL INFO
function getChartAccountInfo($table, $code, $seaarhobj, $conn){
  $arr = [];
  $data="";

  $sqlName = "SELECT * FROM ";
  $sqlName.= $table;
  $sqlName.= " WHERE account_code_lc = '$code'  ";

  $resultName = $conn->query($sqlName);

  if($resultName->num_rows > 0){
      while ($row = mysqli_fetch_array($resultName)) {
          $arr[0] = $row['account_code_lc'];
          $arr[1] = $row['account_code'];
          $arr[2] = $row['account_type'];
          $arr[3] = $row['account_category'];
          $arr[4] = $row['account_title'];
          $arr[5] = $row['beginning_balance'];
      }
      if($seaarhobj==5){
        return($arr);
      }else{
        $data=$arr[$seaarhobj];
        return($data);
      }   
  }
}

function getDepositInfo($table, $id, $referencenumber, $seaarhobj, $conn){
  $arr=[];
  $retarr=[];
  $data=0;
  

  $sqlbi = "SELECT * FROM "; 
  $sqlbi .= $table;
  $sqlbi .= " WHERE id_number = '$id' and (voucher_number = '$referencenumber' or reference_number = '$referencenumber')";
    $resultbi = $conn->query($sqlbi);
    $numRowTD = mysqli_num_rows($resultbi);
    
    if($resultbi->num_rows > 0){
      while ($row = mysqli_fetch_array($resultbi)) {
          $arr[0] = $row['transaction_number'];
          $arr[1] = $row['id_number'];
          $arr[2] = $row['type_transaction'];
          $arr[3] = $row['type_savings'];
          $arr[4] = $row['voucher_number'];
          $arr[5] = $row['reference_number'];
          $arr[6] = $row['amount']; 
          $arr[7] = $row['date_transaction'];
          $arr[8] = $row['encoded_by'];
      }

      if($seaarhobj==5){
        return($arr);
      }else{
        $data=$arr[$seaarhobj];
        return($data);
      }
      
    }else{
      if($seaarhobj==5){
        return($arr);
      }else{
        $data=$arr[$seaarhobj];
        return($data);
      }
    }
}

function getSCInfo($table, $id, $referencenumber, $seaarhobj, $conn){
  $arr=[];
  $retarr=[];
  $data=0;
  

  $sqlbi = "SELECT * FROM "; 
  $sqlbi .= $table;
  $sqlbi .= " WHERE id_number = '$id' and (voucher_number = '$referencenumber' or reference_number = '$referencenumber') ";
    $resultbi = $conn->query($sqlbi);
    $numRowTD = mysqli_num_rows($resultbi);
    
    if($resultbi->num_rows > 0){
      while ($row = mysqli_fetch_array($resultbi)) {
          $arr[0] = $row['transaction_number'];
          $arr[1] = $row['id_number'];
          $arr[2] = $row['type_transaction'];
          $arr[3] = $row['voucher_number'];
          $arr[4] = $row['reference_number'];
          $arr[5] = $row['amount']; 
          $arr[6] = $row['date_transaction'];
          $arr[7] = $row['encoded_by'];
      }
      if($seaarhobj==5){
        return($arr);
      }else{
        $data=$arr[$seaarhobj];
        return($data);
      }
    }else{
      if($seaarhobj==5){
        return($arr);
      }else{
        $data=$arr[$seaarhobj];
        return($data);
      }
    }
}


function getOIInfo($table, $id, $referencenumber, $oicode, $seaarhobj ,$conn){
  $arr=[];
  $retarr=[];
  $data=0;
  

  $sqlbi = "SELECT * FROM "; 
  $sqlbi .= $table;
  $sqlbi .= " WHERE id_number='$id' and reference_number='$referencenumber' and income_code='$oicode' ";
    $resultbi = $conn->query($sqlbi);
    $numRowTD = mysqli_num_rows($resultbi);
    
    if($resultbi->num_rows > 0){
      while ($row = mysqli_fetch_array($resultbi)) {
          $arr[0] = $row['transaction_number'];
          $arr[1] = $row['id_number'];
          $arr[2] = $row['reference_number'];
          $arr[3] = $row['income_code'];
          $arr[4] = $row['amount']; 
          $arr[5] = $row['date_transaction'];
          $arr[6] = $row['encoded_by'];
      }
      $data=$arr[$seaarhobj];
      return($data);
    }else{
      return($data);
    }
}

function getCDInfo($sdate, $edate, $conn){
  $arr=[];
  $arrcontainer=[];

  $sqlNameD = "SELECT * FROM  disbursement_table WHERE date_transaction >='$sdate' and date_transaction <='$edate'order by reference_number  asc";
  $resultNameD = $conn->query($sqlNameD);
  $numRow = mysqli_num_rows($resultNameD);

  if($resultNameD->num_rows > 0){
    while ($row = mysqli_fetch_array($resultNameD)) {
      $arr[0] = $row['transaction_number'];
      $arr[1] = $row['reference_number'];
      $arr[2] = $row['id_number'];
      $arr[3] = $row['date_transaction'];
      $arr[4] = $row['encoded_by'];

      $arr[5] = $row['ac'];
      $arr[6] = $row['cl'];
      $arr[7] = $row['lb'];
      $arr[8] = $row['pnl'];
      $arr[9] = $row['pnr'];
      $arr[10] = $row['rcln'];
      $arr[11] = $row['sc'];
      $arr[12] = $row['sd'];
      $arr[13] = $row['td'];
      $arr[14] = $row['fd'];

      $arr[15] = $row['bl'];
      $arr[16] = $row['cll'];
      $arr[17] = $row['cml'];
      $arr[18] = $row['edl'];
      $arr[19] = $row['rl'];
      $arr[20] = $row['pl'];
      $arr[21] = $row['cl'];
      $arr[22] = $row['ckl'];
      $arr[23] = $row['eml'];
      $arr[24] = $row['sl'];

      $arr[25] = $row['rcln_value'];

      array_push($arrcontainer, $arr);
    }
    return($arrcontainer);
  }else{
    return($arrcontainer);
  }
}

function geJEInfo($sdate, $edate, $conn){
  $arr=[];
  $arrcontainer=[];

  $sqlNameD = "SELECT * FROM  journal_report_table WHERE date_transaction >='$sdate' and date_transaction <='$edate'order by journal_number_temp  asc";
  $resultNameD = $conn->query($sqlNameD);
  $numRow = mysqli_num_rows($resultNameD);

  if($resultNameD->num_rows > 0){
    while ($row = mysqli_fetch_array($resultNameD)) {
      $arr[0] = $row['transaction_number'];
      $arr[1] = $row['reference_number'];
      $arr[2] = $row['id_number'];
      $arr[3] = $row['date_transaction'];
      $arr[4] = $row['encoded_by'];

      $arr[5] = $row['ac'];
      $arr[6] = $row['sd'];
      $arr[7] = $row['sc'];
      $arr[8] = $row['pnl'];
      $arr[9] = $row['pnr'];
      $arr[10] = $row['msl'];
      $arr[11] = $row['mbf'];

      $arr[12] = $row['rcln_value'];
      

      $arr[13] = $row['bl'];
      $arr[14] = $row['cll'];
      $arr[15] = $row['cml'];
      $arr[16] = $row['edl'];
      $arr[17] = $row['rl'];
      $arr[18] = $row['pl'];
      $arr[19] = $row['cl'];
      $arr[20] = $row['ckl'];
      $arr[21] = $row['eml'];
      $arr[22] = $row['sl'];
      $arr[23] = $row['rcl'];
      

      array_push($arrcontainer, $arr);
    }
    return($arrcontainer);
  }else{
    return($arrcontainer);
  }
}



function getJEInfoD($jnumber, $idnumber, $conn){
  $arr=[];
  $arrcontainer=[];

  $sqlNameD = "SELECT * FROM  journal_report_table WHERE reference_number = '$jnumber' and id_number = '$idnumber' order by journal_number_temp  asc";
  $resultNameD = $conn->query($sqlNameD);
  $numRow = mysqli_num_rows($resultNameD);

  if($resultNameD->num_rows > 0){
    while ($row = mysqli_fetch_array($resultNameD)) {
      $arr[0] = $row['transaction_number'];
      $arr[1] = $row['reference_number'];
      $arr[2] = $row['id_number'];
      $arr[3] = $row['date_transaction'];
      $arr[4] = $row['encoded_by'];

      $arr[5] = $row['ac'];
      $arr[6] = $row['sd'];
      $arr[7] = $row['sc'];
      $arr[8] = $row['pnl'];
      $arr[9] = $row['pnr'];
      $arr[10] = $row['msl'];
      $arr[11] = $row['mbf'];

      $arr[12] = $row['rcln_value'];
      

      $arr[13] = $row['bl'];
      $arr[14] = $row['cll'];
      $arr[15] = $row['cml'];
      $arr[16] = $row['edl'];
      $arr[17] = $row['rl'];
      $arr[18] = $row['pl'];
      $arr[19] = $row['cl'];
      $arr[20] = $row['ckl'];
      $arr[21] = $row['eml'];
      $arr[22] = $row['sl'];
      $arr[23] = $row['rcl'];
      

      array_push($arrcontainer, $arr);
    }
    return($arrcontainer);
  }else{
    return($arrcontainer);
  }
}

function getRepID($table,$jnumber, $conn){
  $data="";

  $sqlNameD = "SELECT * FROM ";
  $sqlNameD .= "$table";
  $sqlNameD .= " WHERE reference_number = '$jnumber' ";
  $resultNameD = $conn->query($sqlNameD);
  $numRow = mysqli_num_rows($resultNameD);

  if($resultNameD->num_rows > 0){
    while ($row = mysqli_fetch_array($resultNameD)) {

      $data = $row['id_number'];

    }
    return($data);
  }else{
    return($data);
  }
}

function getLoanInfoP($table, $referencenumber, $id, $conn){
}

function getLoanInfoI($table, $referencenumber, $id, $conn){
  $arr=[];
  $arrcontainer=[];
  $retarr=[];

  $sqlName = "SELECT * FROM ";
  $sqlName .= $table;
  $sqlName .= " WHERE voucher_number ='referencenumber' and id_number = 'id' ";
  $resultName = $conn->query($sqlName);

  if($resultName->num_rows > 0){
    while ($row = mysqli_fetch_array($resultName)) {
      $arr[0] = $row['transaction_number'];
      $arr[1] = $row['id_number'];
      $arr[2] = $row['loan_application_number'];
      $arr[3] = $row['voucher_number'];
      $arr[4] = $row['checque_number'];
      $arr[5] = $row['reference_number'];
      $arr[6] = $row['date_transaction'];
      $arr[7] = $row['encoded_by'];

      $arr[8] = $row['service_fee'];
      $arr[9] = $row['filling_fee'];
      $arr[10] = $row['notarial_fee'];
      $arr[11] = $row['insurance_fee'];
      $arr[12] = $row['interest_revenue'];

      $arr[13] = $row['amount_release'];

      $arr[14] = $row['voucher_i'];
      $arr[15] = $row['loanb_i'];
      $arr[16] = $row['loanb_v'];

      $arr[17] = $row['payment_count'];
    }
    return($arr);
  }
}

function getCAInfo($table, $id, $referencenumber, $seaarhobj ,$conn){
  $arr=[];
  $retarr=[];
  $data=0;
  

  $sqlbi = "SELECT * FROM "; 
  $sqlbi .= $table;
  $sqlbi .= " WHERE expenses_category='$id' and voucher_number='$referencenumber'";
    $resultbi = $conn->query($sqlbi);
    $numRowTD = mysqli_num_rows($resultbi);
    
    if($resultbi->num_rows > 0){
      while ($row = mysqli_fetch_array($resultbi)) {
          $arr[0] = $row['transaction_number'];
          $arr[1] = $row['transaction_type'];
          $arr[2] = $row['expenses_type'];
          $arr[3] = $row['expenses_category'];
          $arr[4] = $row['cr_dr']; 
          $arr[5] = $row['account_expense'];
          $arr[6] = $row['amount'];
          $arr[7] = $row['voucher_number'];
          $arr[8] = $row['reference_number'];
          $arr[9] = $row['checque_number'];
          $arr[10] = $row['Remarks'];
          $arr[11] = $row['date_transaction'];
          $arr[12] = $row['encoded_by'];
      }
      if($seaarhobj==5){
        return($arr);
      }else{
        $data=$arr[$seaarhobj];
        return($data);
      }
    }else{
      if($seaarhobj==5){
        return($arr);
      }else{
        $data=$arr[$seaarhobj];
        return($data);
      }
    }
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>