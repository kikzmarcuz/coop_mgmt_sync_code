<html lang="en">

<?php  

require_once 'session.php';

$idNumber = "";
$accountNumber = "";

$firstName = "";
$middleName = "";
$lastName = "";

$firstNameT = "";
$middleNameT = "";
$lastNameT = "";

$infomessage = "";

$identifier = "";
$countErr = "";

$searchMember = "";
$submitApplication = "";
$searchIDMember = "";

$totalSC = 0;
$totalSD = 0;
$totalSW = 0;
$totalSCW = 0;
$totalAS = 0;

$totalSCC = 0;
$totalSDC = 0;
$totalSWC = 0;
$totalASC = 0;


$loanApplicationNumberId = "";
$referencenumber = "";
$amountPayment = 0;
$datePayment = "";

$amountPaymentPD = 0;
$datePaymentPD = "";
$amountPaymentP[] = "";
$amountPI[] = 0;
$amountPaymentPP[] = 0;
$amountBalance[] = 0;
$datePaymentP[] = "";
$orNumber[] = "";
$invoiceNumber[] = "";

$loanApplicationNumberP = "";
$loanServiceIdP = 0;
$loanAmountP = 0;
$interestAmountP = 0;
$loanInterestP = 0;
$loanTermP = 0;
$typeInterestP = "";
$monthDate = "";
$paymentTermP = 0;
$loanStatusP = 0;

$savingsDeposit = 0;
$cbuDeposit = 0;
$ricePayment = 0;
$RiceLoanAP = 0;

$loanApplicationNumber[] = "";
$loanServiceId[] = "";
$loanAmount[] = 0;
$interestAmount[] = 0;
$loanTerm[] = "";
$loanStatus[] = "";
$riceInvoice[] = "";
$loanName[] = "";
//$invoiceNumberP[] = "";

//Previous Payment
$loanApplicationNumberPL = "";
$datePaymentPL = "";
$orNumberPL = "";
$principalPaymentPL = 0;
$interestPaymentPL = 0;
$placePayment = "";

//Savings Ledger
$transactionNumberS[] = "";
$typeTransactionS[] = "";
$referemceNumberS[] = "";
$amountS[] = 0;
$dateTransactionS[] = "";

//ShareCapital
$transactionNumberSC[] = "";
$typeTransactionSC[] = "";
$referemceNumberSC[] = "";
$amountSC[] = 0;
$dateTransactionSC[] = "";

$countErr = "";
$countErrPL = "";
$submitApplication = "";
$searchMember = "";
$identifier = "";
$showsl = "";
$showscl = "";
$showls = "";
$counterPaymentPL = "";

$typeLoan = "";

$paidLoan = "";

$ledgerIdentifier = "";
$numRow = 0;
$numRowS = 0;
$numRowSC = 0;
$infomessage = "";
$idNumberSearch = "";
$updateLI = "";
$exitB = "";
$printLedger = "";
$proceedPayment = "";
$searchOR = "";
$reloan = "";

$countErr = 0;

$displayPropertySavings = "none";
$displayPropertyLoan = "none";
$displayPropertySC = "none";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  //if (empty($_POST["counterPaymentPL"])) {
    //$countErrPL++;
  //}else {
    //$counterPaymentPL = test_input($_POST["counterPaymentPL"]);
  //}

  if(!empty($_POST["idNumber"])){
    $counterPaymentPL = test_input($_POST["counterPaymentPL"]);
  }

  if(!empty($_POST["typeLoan"])){
    $typeLoan = test_input($_POST["typeLoan"]);
  }

  if(!empty($_POST["idNumber"])){
	$idNumber = test_input($_POST["idNumber"]);
  }

  if(!empty($_POST["searchIDMember"])){
    $searchIDMember = test_input($_POST["searchIDMember"]);
  }

  if (!empty($_POST["myButton"])) {
      $loanApplicationNumberId = test_input($_POST["myButton"]);
      $ledgerIdentifier = "LL";
  }

  if(!empty($_POST["exitB"])){
    $exitB = test_input($_POST["exitB"]);
  }

  if(!empty($_POST["updateLI"])){
    $updateLI = test_input($_POST["updateLI"]);
  }

  if(!empty($_POST["placePayment"])){
    $placePayment = test_input($_POST["placePayment"]);
  }

  if(!empty($_POST["printLedger"])){
    $printLedger = test_input($_POST["printLedger"]);
  }

  if(!empty($_POST["proceedPayment"])){
    $proceedPayment = test_input($_POST["proceedPayment"]);
  }

  if(!empty($_POST["searchOR"])){
    $searchOR = test_input($_POST["searchOR"]);
  }

  if(!empty($_POST["reloan"])){
    $reloan = test_input($_POST["reloan"]);
  }

  if(!empty($_POST["totalAS"])){
    $totalAS = test_input($_POST["totalAS"]);
  }

  if(!empty($_POST["totalSC"])){
    $totalSC = test_input($_POST["totalSC"]);
  }

  if(!empty($_POST["accountNumber"])){
    $accountNumber = test_input($_POST["accountNumber"]);
  }

  if(!empty($_POST["firstName"])){
    $firstName = test_input($_POST["firstName"]);
  }

  if(!empty($_POST["middleName"])){
    $middleName = test_input($_POST["middleName"]);
  }

  if(!empty($_POST["lastName"])){
    $lastName = test_input($_POST["lastName"]);
  }

  if(!empty($_POST["idNumberSearch"])){
    $idNumberSearch = test_input($_POST["idNumberSearch"]);
  }

  if($exitB == "exitB"){
    session_destroy();
    //header("Location: http://localhost/projectkikz/samplemwmmpc/application/views/home/login.php");
    require_once 'logout.php';
  }

  if($proceedPayment == "proceedPayment"){
    //session_destroy();
    header("Location: http://localhost/projectkikz/samplemwmmpc/application/views/home/loanPayment.php");
    //header("Location: http://system.local/application/views/home/loanPayment.php");
  }

  if(!empty($_POST["showls"])){
    $showls = test_input($_POST["showls"]);
  }

  if(!empty($_POST["showscl"])){
    $showscl = test_input($_POST["showscl"]);
    $ledgerIdentifier = "SCL";
  }

  if(!empty($_POST["showsl"])){
    $showsl = test_input($_POST["showsl"]);
    $ledgerIdentifier = "SL";
  }

  if (empty($_POST["loanApplicationNumberP"])) {
    $countErr++;
  }else {
    $loanApplicationNumberP = test_input($_POST["loanApplicationNumberP"]);
  }

  if (empty($_POST["loanAmountP"]) && !is_numeric($_POST["loanAmountP"])) {
    $countErr++;
  }else {
    $loanAmountP = test_input($_POST["loanAmountP"]);
  }

  if (empty($_POST["paymentTermP"])) {
    $countErr++;
  }else {
    $paymentTermP = test_input($_POST["paymentTermP"]);
  }

  if (empty($_POST["loanStatusP"])) {
    $countErr++;
  }else {
    $loanStatusP = test_input($_POST["loanStatusP"]);
  }

  if (empty($_POST["datePaymentPL"])) {
    $countErrPL++;
  }else {
    $datePaymentPL = test_input($_POST["datePaymentPL"]);
  }

  if (empty($_POST["loanApplicationNumberPL"])) {
    $countErrPL++;
  }else {
    $loanApplicationNumberPL = test_input($_POST["loanApplicationNumberPL"]);
  }

  if (empty($_POST["orNumberPL"])) {
    $countErrPL++;
  }else {
    $orNumberPL = test_input($_POST["orNumberPL"]);
  }

  if (empty($_POST["principalPaymentPL"]) && !is_numeric($_POST["principalPaymentPL"])) {
    $countErrPL++;
  }else {
    $principalPaymentPL = test_input($_POST["principalPaymentPL"]);
  }

  if (empty($_POST["interestPaymentPL"]) && !is_numeric($_POST["interestPaymentPL"])) {
    $countErrPL++;
  }else {
    $interestPaymentPL = test_input($_POST["interestPaymentPL"]);
  }

  if($showsl == "showsl"){
    $displayPropertySavings = "inline";
  }else{
    $displayPropertySavings = "none";
  }

  if($showscl == "showscl"){
    $displayPropertySC = "inline";
  }else{
    $displayPropertySC = "none";
  }

  if($showls == "showls"){
    $displayPropertyLoan = "inline";
  }else{
    $displayPropertyLoan = "none";
  }

  if($searchOR == "searchOR"){
    if(substr($loanApplicationNumberP, 0,2) == "PL"){
      $sqlLP1 = "SELECT * FROM  pl_loan_payment_table WHERE reference_number = '$orNumberPL' ";
      $resultLP1 = $conn->query($sqlLP1);

      $sqlLP2 = "SELECT * FROM  pl_credit_revenue_table WHERE reference_number = '$orNumberPL' ";
      $resultLP2 = $conn->query($sqlLP2);

      //Principal
      if($resultLP1->num_rows > 0){
          $plValueTemp = 0;
          while ($row = mysqli_fetch_array($resultLP1)) {
              # code...
              $plValueTemp = $plValueTemp + $row['amount'];
              $principalPaymentPL= $plValueTemp;
              $datePaymentPL = $row['date_payment'];
              $loanApplicationNumberPL = $row['loan_application_number'];
          }
      }

      //Interest
      if($resultLP2->num_rows > 0){
          $pliValueTemp = 0;
          while ($row = mysqli_fetch_array($resultLP2)) {
              # code...
              $pliValueTemp = $pliValueTemp + $row['interest_revenue'];
              $interestPaymentPL= $pliValueTemp;
          }
      }
    }

    if(substr($loanApplicationNumberP, 0,2) == "RL"){
      $sqlLP1 = "SELECT * FROM  rl_loan_payment_table WHERE reference_number = '$orNumberPL' ";
      $resultLP1 = $conn->query($sqlLP1);

      $sqlLP2 = "SELECT * FROM  rl_credit_revenue_table WHERE reference_number = '$orNumberPL' ";
      $resultLP2 = $conn->query($sqlLP2);

      //Principal
      if($resultLP1->num_rows > 0){
          $plValueTemp = 0;
          while ($row = mysqli_fetch_array($resultLP1)) {
              # code...
              $plValueTemp = $plValueTemp + $row['amount'];
              $principalPaymentPL= $plValueTemp;
              $datePaymentPL = $row['date_payment'];
              $loanApplicationNumberPL = $row['loan_application_number'];
          }
      }

      //Interest
      if($resultLP2->num_rows > 0){
          $pliValueTemp = 0;
          while ($row = mysqli_fetch_array($resultLP2)) {
              # code...
              $pliValueTemp = $pliValueTemp + $row['interest_revenue'];
              $interestPaymentPL= $pliValueTemp;
          }
      }
    }

    if(substr($loanApplicationNumberP, 0,3) == "RCL"){
      $sqlLP1 = "SELECT * FROM  rice_loan_table WHERE invoice_number = '$orNumberPL' ";
      $resultLP1 = $conn->query($sqlLP1);

      //$sqlLP2 = "SELECT * FROM  rice_credit_revenue_table WHERE reference_number = '$orNumberPL' ";
      //$resultLP2 = $conn->query($sqlLP2);

      //Principal
      if($resultLP1->num_rows > 0){
          $plValueTemp = 0;
          while ($row = mysqli_fetch_array($resultLP1)) {
              # code...
              $plValueTemp = $plValueTemp + $row['loan_amount'];
              $principalPaymentPL= $plValueTemp;
              //$datePaymentPL = $row['date_payment'];
              $loanApplicationNumberPL = $row['loan_application_number'];
              $pliValueTemp = $pliValueTemp + $row['loan_interest'];
              $interestPaymentPL= $pliValueTemp;
          }
      }

      //Interest
      //if($resultLP2->num_rows > 0){
          //$pliValueTemp = 0;
          //while ($row = mysqli_fetch_array($resultLP2)) {
              # code...
              //$pliValueTemp = $pliValueTemp + $row['interest_revenue'];
              //$interestPaymentPL= $pliValueTemp;
          //}
      //}
    }

  }

  if($reloan == "reloan"){
    if(substr($loanApplicationNumberP, 0,2) == "PL"){
        if($countErrPL == 0){
            $sql = "INSERT INTO pl_loan_payment_table(id_number, reference_number,loan_application_number, amount,date_payment, encoded_by) 
                        VALUES ('$idNumber','$loanApplicationNumberPL','$loanApplicationNumberP','$principalPaymentPL','$datePaymentPL', '$encodedBy')";

            $sql1 = "INSERT INTO pl_credit_revenue_table(id_number,loan_application_number, reference_number,interest_revenue, date_transaction,encoded_by) 
                VALUES ('$idNumber','$loanApplicationNumberP','$loanApplicationNumberPL','$interestPaymentPL','$datePaymentPL', '$encodedBy')";

            if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE){
                    $infomessage = "Payment has been posted";
                    echo "$infomessage";

                    $loanApplicationNumberPL = "";
                    $datePaymentPL = "";
                    $orNumberPL = "";
                    $principalPaymentPL = 0;
                    $interestPaymentPL = 0;
            }else{
                echo "Error: " . $sql . "<br>" . $conn->error;
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
        }
    }else{
        echo "Payment not applicable";
    } 
  }

  if($placePayment == "placePayment"){
    if($loanApplicationNumberPL == $loanApplicationNumberP){
      if(substr($loanApplicationNumberPL, 0,2) == "PL"){
        $sql = "UPDATE pl_loan_payment_table SET
        amount = '$principalPaymentPL'
        WHERE reference_number = '$orNumberPL'";

        $sql1 = "UPDATE pl_credit_revenue_table SET
        interest_revenue = '$interestPaymentPL'
        WHERE reference_number = '$orNumberPL'";

        if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE) {
           $infomessage = "Record updated successfully";
           //echo "$infomessage";
        } 

        else { 
              echo "Error: " . $sql . "<br>" . $conn->error;
              echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
      }elseif (substr($loanApplicationNumberPL, 0,2) == "RL") {
        $sql = "UPDATE rl_loan_payment_table SET
        amount = '$principalPaymentPL'
        WHERE reference_number = '$orNumberPL'";

        $sql1 = "UPDATE rl_credit_revenue_table SET
        interest_revenue = '$interestPaymentPL'
        WHERE reference_number = '$orNumberPL'";

        if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE) {
           $infomessage = "Record updated successfully";
           //echo "$infomessage";
        } 

        else { 
              echo "Error: " . $sql . "<br>" . $conn->error;
              echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
      }elseif (substr($loanApplicationNumberPL, 0,3) == "RCL") {
        $sql = "UPDATE rice_loan_table SET
        loan_amount = '$principalPaymentPL',
        loan_interest = '$interestPaymentPL'
        WHERE invoice_number = '$orNumberPL'";

        //$sql1 = "UPDATE rl_credit_revenue_table SET
        //interest_revenue = '$interestPaymentPL'
        //WHERE reference_number = '$orNumberPL'";

        if ($conn->query($sql) === TRUE) {
           $infomessage = "Record updated successfully";
           //echo "$infomessage";
        } 

        else { 
              echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
    }else{
      if(substr($loanApplicationNumberPL, 0,2) == "PL"){
        $sql = "UPDATE pl_loan_payment_table SET
        loan_application_number = '$loanApplicationNumberPL'
        WHERE reference_number = '$orNumberPL'";

        $sql1 = "UPDATE pl_credit_revenue_table SET
        loan_application_number = '$loanApplicationNumberPL'
        WHERE reference_number = '$orNumberPL'";

        if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE) {
           $infomessage = "Record updated successfully";
           //echo "$infomessage";
        } 

        else { 
              echo "Error: " . $sql . "<br>" . $conn->error;
              echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
      }

      if(substr($loanApplicationNumberPL, 0,2) == "RL"){
        $sql = "DELETE FROM pl_loan_payment_table 
        WHERE reference_number = '$orNumberPL'";

        $sql1 = "DELETE FROM pl_credit_revenue_table
        WHERE reference_number = '$orNumberPL'";

        if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE) {
           $infomessage = "Record updated successfully";
           //echo "$infomessage";
        } 

        else { 
              echo "Error: " . $sql . "<br>" . $conn->error;
              echo "Error: " . $sql1 . "<br>" . $conn->error;
        }

        $sql = "INSERT INTO rl_loan_payment_table(id_number, reference_number,loan_application_number, amount,date_payment, encoded_by) 
        VALUES ('$idNumber','$orNumberPL','$loanApplicationNumberPL','$principalPaymentPL','$datePaymentPL', '$encodedBy')";

        $sql1 = "INSERT INTO rl_credit_revenue_table(id_number,loan_application_number, reference_number,interest_revenue, date_transaction,encoded_by) 
            VALUES ('$idNumber','$loanApplicationNumberPL','$orNumberPL','$interestPaymentPL','$datePaymentPL', '$encodedBy')";

        if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE){
                $infomessage = "Payment has been posted";
                echo "$infomessage";

                $loanApplicationNumberP = "";
                $datePaymentPL = "";
                $orNumberPL = "";
                $principalPaymentPL = 0;
                $interestPaymentPL = 0;
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
      }

    }  
  }

  if($updateLI = "updateLI"){
    if(substr($loanApplicationNumberP, 0,2) == "BL"){
        if($countErr == 0){
            $sql = "UPDATE bl_loan_table SET
            loan_amount = '$loanAmountP',
            payment_term = '$paymentTermP',
            loan_status = '$loanStatusP',
            loan_service_id = '$typeLoan'
            WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

            if ($conn->query($sql) === TRUE) {
               $infomessage = "Record updated successfully";
               echo "$infomessage";
               $loanApplicationNumberP = "";
               $loanAmountP = 0;
               $paymentTermP = "";
               $loanStatusP = "";
            } 
            else { 
                  echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Fill up empty field";
        }
    }elseif(substr($loanApplicationNumberP, 0,3) == "CLL"){
        if($countErr == 0){
            $sql = "UPDATE cl_loan_table SET
            loan_amount = '$loanAmountP',
            payment_term = '$paymentTermP',
            loan_status = '$loanStatusP'
            WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

            if ($conn->query($sql) === TRUE) {
               $infomessage = "Record updated successfully";
               //echo "$infomessage";
            } 

            else { 
                  echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Fill up empty field";
        }
    }elseif(substr($loanApplicationNumberP, 0,2) == "CL"){
        if($countErr == 0){
            $sql = "UPDATE cl_loan_table SET
            loan_amount = '$loanAmountP',
            payment_term = '$paymentTermP',
            loan_status = '$loanStatusP'
            WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

            if ($conn->query($sql) === TRUE) {
               $infomessage = "Record updated successfully";
               //echo "$infomessage";
            } 

            else { 
                  echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Fill up empty field";
        }
    }elseif(substr($loanApplicationNumberP, 0,3) == "EDL"){
        if($countErr == 0){
            $sql = "UPDATE edl_loan_table SET
            loan_amount = '$loanAmountP',
            payment_term = '$paymentTermP',
            loan_status = '$loanStatusP'
            WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

            if ($conn->query($sql) === TRUE) {
               $infomessage = "Record updated successfully";
               //echo "$infomessage";
            } 

            else { 
                  echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Fill up empty field";
        }
    }elseif(substr($loanApplicationNumberP, 0,3) == "EML"){
        if($countErr == 0){
            $sql = "UPDATE eml_loan_table SET
            loan_amount = '$loanAmountP',
            payment_term = '$paymentTermP',
            loan_status = '$loanStatusP'
            WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

            if ($conn->query($sql) === TRUE) {
               $infomessage = "Record updated successfully";
               //echo "$infomessage";
            } 

            else { 
                  echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Fill up empty field";
        }
    }elseif(substr($loanApplicationNumberP, 0,2) == "RL"){
        if($countErr == 0){
            $sql = "UPDATE rl_loan_table SET
            loan_amount = '$loanAmountP',
            payment_term = '$paymentTermP',
            loan_status = '$loanStatusP'
            WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

            if ($conn->query($sql) === TRUE) {
               $infomessage = "Record updated successfully";
               //echo "$infomessage";
            } 

            else { 
                  echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Fill up empty field";
        }
    }elseif(substr($loanApplicationNumberP, 0,2) == "SL"){
        if($countErr == 0){
            $sql = "UPDATE sl_loan_table SET
            loan_amount = '$loanAmountP',
            payment_term = '$paymentTermP',
            loan_status = '$loanStatusP'
            WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

            if ($conn->query($sql) === TRUE) {
               $infomessage = "Record updated successfully";
               //echo "$infomessage";
            } 

            else { 
                  echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Fill up empty field";
        }
    }elseif(substr($loanApplicationNumberP, 0,2) == "PL"){
        if($countErr == 0){
            $sql = "UPDATE pl_loan_table SET
            loan_amount = '$loanAmountP',
            payment_term = '$paymentTermP',
            loan_status = '$loanStatusP',
            counter_payment = '$counterPaymentPL'
            WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

            if ($conn->query($sql) === TRUE) {
               $infomessage = "Record updated successfully";
               //echo "$infomessage";
            } 

            else { 
                  echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Fill up empty field";
        }
    }elseif(substr($loanApplicationNumberP, 0,3) == "RCL"){
        if($countErr == 0){
            $sql = "UPDATE rice_loan_table SET
            loan_amount = '$loanAmountP',
            payment_term = '$paymentTermP',
            loan_status = '$loanStatusP'
            WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

            if ($conn->query($sql) === TRUE) {
               $infomessage = "Record updated successfully";
               //echo "$infomessage";
            } 

            else { 
                  echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            echo "Fill up empty field";
        }
    }
  }

  if($searchIDMember == "searchIDMember" or $loanApplicationNumberId != "" or $idNumber!="" ){
    $sqlSearchName = "SELECT * FROM name_table WHERE CONCAT(first_name, ' ', last_name) LIKE '%$idNumberSearch%' OR last_name LIKE '%$idNumberSearch%' or  id_number = '$idNumberSearch' ";
    $resultSearchName = $conn->query($sqlSearchName);

    if($resultSearchName->num_rows > 0){
        while($row = mysqli_fetch_array($resultSearchName)){
          $idNumber = $row['id_number'];
          $accountNumber = $row['account_number'];
          $firstName = $row['first_name'];
          $middleName = $row['middle_name'];
          $lastName = $row['last_name'];
        }
    }

    if($searchIDMember == "searchIDMember"){
        $loanApplicationNumberP = "";
        $datePaymentPL = "";
        $orNumberPL = "";
        $principalPaymentPL = 0;
        $interestPaymentPL = 0;
        $loanAmountP = 0;
        $paymentTermP = "";
        $loanStatusP = "";
    }

    $totalSC = 0;
    $totalAS = 0;
    $totalASC = 0;

    //Share Capital Total
    $sqlSC = "SELECT amount FROM share_capital_table WHERE id_number = '$idNumber' and (type_transaction = 'BSC' or type_transaction = 'Patronage' or type_transaction = 'CBU' or type_transaction = 'SCF')";
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

    //Savings Total
    $sqlSD = "SELECT amount FROM savings_table WHERE id_number = '$idNumber' and (type_transaction = 'Deposit' or type_transaction = 'Patronage')";
    $resultSD = $conn->query($sqlSD);
    
     if($resultSD->num_rows > 0){
        while ($row = mysqli_fetch_array($resultSD)) {
            $totalSD = $totalSD + $row['amount'];
        }
     }else{
            $totalSD = 0;
     }

    $sqlSW = "SELECT amount FROM savings_table WHERE id_number = '$idNumber' and type_transaction = 'Withdraw' ";
    $resultSW = $conn->query($sqlSW);
    
     if($resultSW->num_rows > 0){
        while ($row = mysqli_fetch_array($resultSW)) {
            $totalSW = $totalSW + $row['amount'];
        }
     }else{
            $totalSW = 0;
     }

     $totalAS = $totalSD - $totalSW;

    //SC Ledger
    $sqlSDL = "SELECT * FROM share_capital_table WHERE id_number = '$idNumber' ";
    $resultSDL = $conn->query($sqlSDL);
    $numRowSC = mysqli_num_rows($resultSDL);
    $counterSC = 0;
    $checkVReferenceSC = "";
    $checkOReferenceSC = "";
    
    if($resultSDL->num_rows > 0){
        while ($row = mysqli_fetch_array($resultSDL)) {
            $transactionNumberSC[$counterSC] = $row['transaction_number'];
            $typeTransactionSC[$counterSC] = $row['type_transaction'];
            $transactionNumberSC[$counterSC] = $row['transaction_number'];
            $checkVReferenceSC = $row['voucher_number'];
            $checkOReferenceSC = $row['reference_number'];
            if($checkVReferenceSC != ""){
                $referemceNumberSC[$counterSC] = $checkVReferenceSC;
            }
            if($checkOReferenceSC != ""){
                $referemceNumberSC[$counterSC] = $checkOReferenceSC;
            }

            if($checkOReferenceSC == "" and $checkVReferenceSC == ""){
                $referemceNumberSC[$counterSC] = "NONE";
            }

            $amountSC[$counterSC] = $row['amount'];
            $dateTransactionSC[$counterSC] = $row['date_transaction'];

            $counterSC++;
        }
    }

    //Savings Ledger
    $sqlSDL = "SELECT * FROM savings_table WHERE id_number = '$idNumber' ";
    $resultSDL = $conn->query($sqlSDL);
    $numRowS = mysqli_num_rows($resultSDL);
    $counterS = 0;
    $checkVReference = "";
    $checkOReference = "";
    
    if($resultSDL->num_rows > 0){
        while ($row = mysqli_fetch_array($resultSDL)) {
            $transactionNumberS[$counterS] = $row['transaction_number'];
            $typeTransactionS[$counterS] = $row['type_transaction'];
            $transactionNumberS[$counterS] = $row['transaction_number'];
            $checkVReference = $row['voucher_number'];
            $checkOReference = $row['reference_number'];
            if($checkVReference != ""){
                $referemceNumberS[$counterS] = $checkVReference;
            }
            if($checkOReference != ""){
                $referemceNumberS[$counterS] = $checkOReference;
            }
            $amountS[$counterS] = $row['amount'];
            $dateTransactionS[$counterS] = $row['date_transaction'];

            $counterS++;

        }
    }

    # search member...
    $sqlbi = "SELECT * FROM  bl_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);
    $counter = 0;

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $loanStatus[$counter] = $row['loan_status'];
            $interestAmount[$counter] = 0;

            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                $loanName[$counter] = $row['loan_service_name'];
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  ckl_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $loanStatus[$counter] = $row['loan_status'];
            $interestAmount[$counter] = 0;
            
            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                $loanName[$counter] = $row['loan_service_name'];
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  cml_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $interestAmount[$counter] = 0;
            
            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                $loanName[$counter] = $row['loan_service_name'];
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  cl_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $loanStatus[$counter] = $row['loan_status'];
            $interestAmount[$counter] = 0;
            
            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                $loanName[$counter] = $row['loan_service_name'];
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  cll_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $loanStatus[$counter] = $row['loan_status'];
            $interestAmount[$counter] = 0;
          
            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                $loanName[$counter] = $row['loan_service_name'];
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  edl_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $loanStatus[$counter] = $row['loan_status'];
            $interestAmount[$counter] = 0;
            
            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                $loanName[$counter] = $row['loan_service_name'];
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  eml_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $loanStatus[$counter] = $row['loan_status'];
            $interestAmount[$counter] = 0;
            
            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                $loanName[$counter] = $row['loan_service_name'];
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  rl_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $loanStatus[$counter] = $row['loan_status'];
            $interestAmount[$counter] = 0;
            
            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                $loanName[$counter] = $row['loan_service_type'];
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  sl_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $loanStatus[$counter] = $row['loan_status'];
            $interestAmount[$counter] = 0;
            
            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                $loanName[$counter] = $row['loan_service_name'];
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  pl_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $loanTerm[$counter] = $row['loan_term'];
            $loanStatus[$counter] = $row['loan_status'];
            $interestAmount[$counter] = 0;
            
            $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceId[$counter]' ";
            $resultLS = $conn->query($sqlLS);

            if($resultLS->num_rows > 0){
              while ($row = mysqli_fetch_array($resultLS)) {
                if($loanServiceId[$counter] == "LS1" or $loanServiceId[$counter] == "LS2"){
                  $loanName[$counter] = $row['loan_service_type'];
                }else{
                  $loanName[$counter] = $row['loan_service_name'];
                }
                
              }
            }

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    $sqlbi = "SELECT * FROM  rice_loan_table WHERE id_number = '$idNumber' and (loan_status = 'Released' or loan_status = 'Paid') ";
    $resultbi = $conn->query($sqlbi);
    $numRow = $numRow + mysqli_num_rows($resultbi);

    if($resultbi->num_rows > 0){
        while ($row = mysqli_fetch_array($resultbi)) {
            # code...
            $loanApplicationNumber[$counter] = $row['loan_application_number'];
            $loanServiceId[$counter] = $row['loan_service_id'];
            $loanAmount[$counter] = $row['loan_amount'];
            $interestAmount[$counter] = $row['loan_interest'];
            $loanTerm[$counter] = $row['loan_term'];
            $riceInvoice[$counter] = $row['invoice_number'];
            $loanStatus[$counter] = $row['loan_status'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber[$counter]' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($row = mysqli_fetch_array($resultLD)) {
                    # code...
                    $dateApplication[$counter] = $row['date_application'];
                    //$dateApplication[$counter] = new DateTime($monthDate);
                }
            }

            $counter++;
        }
    }

    if($loanApplicationNumberId != ""){

        if(substr($loanApplicationNumberId, 0,2) == "BL"){

            $sqlP = "SELECT * FROM  bl_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  bl_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  bl_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,3) == "CKL"){

            $sqlP = "SELECT * FROM  ckl_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  ckl_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  ckl_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,3) == "CML"){

            $sqlP = "SELECT * FROM  cml_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  cml_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  cml_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,3) == "CLL"){
            $sqlP = "SELECT * FROM  cll_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  cll_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  cll_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,2) == "CL"){
            $sqlP = "SELECT * FROM  cl_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  cl_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  cl_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,3) == "EDL"){

            $sqlP = "SELECT * FROM  edl_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  edl_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  edl_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,3) == "EML"){

            $sqlP = "SELECT * FROM  eml_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  eml_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  eml_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,2) == "RL"){

            $sqlP = "SELECT * FROM  rl_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  rl_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  rl_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,2) == "SL"){

            $sqlP = "SELECT * FROM  sl_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  sl_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  sl_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,2) == "PL"){

            $sqlP = "SELECT * FROM  pl_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $typeLoan = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];
                    $counterPaymentPL = $row['counter_payment'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  pl_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  pl_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP'";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterInterest] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }elseif(substr($loanApplicationNumberId, 0,3) == "RCL"){

            $sqlP = "SELECT * FROM  rice_loan_table WHERE loan_application_number = '$loanApplicationNumberId' ";
            $resultP = $conn->query($sqlP);

            if($resultP->num_rows > 0){
                while ($row = mysqli_fetch_array($resultP)) {
                    # code...
                    $idNumber = $row['id_number'];
                    $loanApplicationNumberP = $row['loan_application_number'];
                    $loanServiceIdP = $row['loan_service_id'];
                    $loanAmountP = $row['loan_amount'];
                    $interestAmountP = $row['loan_amount'];
                    $loanTermP= $row['loan_term'];
                    $loanInterestP = $row['loan_interest'];
                    $paymentTermP = $row['payment_term'];
                    $loanStatusP = $row['loan_status'];
                    $invoiceNumber = $row['invoice_number'];

                    $sqlLS = "SELECT * FROM  loan_services_table WHERE loan_service_id = '$loanServiceIdP' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $typeInterestP = $row['type_interest'];
                        }
                    }

                    $sqlLP = "SELECT * FROM  rice_loan_payment_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLP = $conn->query($sqlLP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterPayment = 0;

                    if($resultLP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP)) {
                            # code...
                            $amountPaymentP[$counterPayment] = $row['amount'];
                            $datePaymentP[$counterPayment] = $row['date_payment'];
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $counterPayment++;
                            
                        }
                    }

                    $sqlLIP = "SELECT * FROM  rice_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumberP' and interest_revenue != 0";
                    $resultLIP = $conn->query($sqlLIP);
                    //$numRow = mysqli_num_rows($resultName);
                    $counterInterest = 0;

                    if($resultLIP->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLIP)) {
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $amountPI[$counterInterest] = $row['interest_revenue'];
                            $orNumber[$counterPayment] = $row['reference_number'];
                            $counterInterest++;
                        }
                    }

                    $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber' ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLS->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLS)) {
                            # code...
                            $accountNumber = $row['account_number'];
                            $firstName = $row['first_name'];
                            $middleName = $row['middle_name'];
                            $lastName = $row['last_name'];
                        }
                    }

                    $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumberP' ";
                    $resultLD = $conn->query($sqlLD);
                    //$numRow = mysqli_num_rows($resultName);

                    if($resultLD->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLD)) {
                            # code...
                            $monthDate = $row['date_application'];
                            $monthDate = new DateTime($monthDate);
                        }
                    }
                }
            }
        }
    }
    if($printLedger == "printLedger"){
        // Code ....
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

<head>
    <?php include "css.html" ?>
    <title>Member Fund Info</title>

</head>

<style type="text/css">
.none{
    display: none;
}
.inline{
    display: inline;
}
</style>

<body>
	<div>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div>
        <?php //include 'topbar.php';?>
        <div class="row">
            <?php include 'navigation.php';?>
            <div class="col-sm-12" style="margin-top:70px;margin-left: 16.7%;">
                <h5 align="margin-left">VIEW FUND MEMBER INFORMATION</h5>
            	<div class="row">
                    <div class="col-lg-2.5" style="background-color:#fff; padding: 5px; margin: 5px; border: solid gray 1px">
                        <h6>Search Member</h6>
                        <div class="form-group">
                            <label class="col-md-5 control-label">ID Number</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value = "<?php echo $idNumberSearch;?>" name = "idNumberSearch">
                            </div>
                            <br>
                            <div class="col-sm-10">
                                  <button class="btn btn-outline-success my-2 my-sm-0" id = "search" name = "searchIDMember" value = "searchIDMember" type="submit">Search</button>
                            </div>
                        </div>

                        <h5>Personal Information</h5>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" class="form-control" value = "<?php echo $idNumber;?>" name = "idNumber" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="First Name" value = "<?php echo $firstName;?>" name = "firstName" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Middle Name" value = "<?php echo $middleName;?>" name = "middleName" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input type="text" class="form-control" placeholder="Last Name" value = "<?php echo $lastName;?>" name = "lastName" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2.5" style="background-color:#fff; padding: 5px; margin: 5px; border: solid gray 1px">
                        <h6>Account Information</h6>
                        <div class="form-group">
                            <label style="width: 200px">Savings</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value = "<?php echo $totalAS;?>" readonly>
                            </div>
                            <br>
                            <div class="col-sm-10">
                                  <button  class="btn btn-outline-success my-2 my-sm-0" name = "showsl" value = "showsl">Show Ledger</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="width: 200px">Share Capital</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" value = "<?php echo $totalASC;?>" readonly>
                            </div>
                            <br>
                            <div class="col-sm-10">
                                  <button class="btn btn-outline-success my-2 my-sm-0" name = "showscl" value = "showscl">Show Ledger</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2.5" style="background-color:#fff; padding: 5px; margin: 5px; border: solid gray 1px">
                        <h6>Loan Information</h6>
                        <button class="btn btn-outline-success my-2 my-sm-0" name = "showls" value = "showls">Show Ledger</button>
                        <br>
                        <h6>Update Loan Information</h6>
                        <Label style="width: 130px"> Application # </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $loanApplicationNumberP;?>" name="loanApplicationNumberP" readonly><br>
                        <Label style="width: 130px"> Loan Amount </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $loanAmountP;?>" name="loanAmountP"><br>
                        <Label style="width: 130px"> Payment Term </Label>
                        <select  style="width: 150px" name="paymentTermP" value="<?php echo $paymentTermP;?>">
                          <option value="" <?php if($paymentTermP == "") echo "selected"; ?>>Select</option>
                          <option value="Daily" <?php if($paymentTermP == "Daily") echo "selected"; ?>>Daily</option>
                          <option value="Semi Monthly" <?php if($paymentTermP == "Semi Monthly") echo "selected"; ?>>Semi Monthly</option>
                          <option value="Monthly" <?php if($paymentTermP == "Monthly") echo "selected"; ?>>Monthly</option>
                          <option value="One Time Payment" <?php if($paymentTermP == "Paid") echo "selected"; ?>>One Time Payment</option>
                        </select>
                        <br>
                        <Label style="width: 130px"> Loan Status </Label>
                        <select  style="width: 150px" name="loanStatusP" value="<?php echo $loanStatusP;?>">
                          <option value="" <?php if($loanStatusP == "") echo "selected"; ?>>Select</option>
                          <option value="Released" <?php if($loanStatusP == "Released") echo "selected"; ?>>Released</option>
                          <option value="Void" <?php if($loanStatusP == "Void") echo "selected"; ?>>Void</option>
                          <option value="Paid" <?php if($loanStatusP == "Paid") echo "selected"; ?>>Paid</option>
                        </select><br>
                        <h6>Previous Loan</h6>
                        <Label style="width: 130px"> Payment Counter </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $counterPaymentPL;?>" name="counterPaymentPL"><br>
                        <Label style="width: 130px"> Type of Loan </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $typeLoan;?>" name="typeLoan"><br>
                        <br>
                        <button class="btn btn-outline-success my-2 my-sm-0" name = "updateLI" value = "updateLI">Update</button>
                    </div>

                    <div class="col-lg-2.5" style="background-color:#fff; padding: 5px; margin: 5px; border: solid gray 1px">
                        <h6>Update Loan Payment</h6>
                        <Label style="width: 130px"> Application # </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $loanApplicationNumberP;?>" name="loanApplicationNumberP"><br>
                        <Label style="width: 130px"> OR # </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $orNumberPL;?>" name="orNumberPL"><br>
                        <button class="btn btn-outline-success my-2 my-sm-0" name = "searchOR" value = "searchOR">Search</button><br>
                        
                        <Label style="width: 130px"> Date </Label>
                        <input style="width: 150px" type="date" value = "<?php echo $datePaymentPL;?>" name="datePaymentPL"><br>
                        <Label style="width: 130px"> Application # </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $loanApplicationNumberPL;?>" name="loanApplicationNumberPL"><br>
                        <Label style="width: 130px"> Principal Amount </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $principalPaymentPL;?>" name="principalPaymentPL"><br>
                        <Label style="width: 130px"> Interest Amount </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $interestPaymentPL;?>" name="interestPaymentPL"><br>
                        <button class="btn btn-outline-success my-2 my-sm-0" name = "placePayment" value = "placePayment">UPDATE</button><br><br>
                        <button class="btn btn-outline-success my-2 my-sm-0" name = "reloan" value = "reloan">RELOAN</button>
                    </div>

                    <div class="col-lg-2.5" style="background-color:#fff; padding: 5px; margin: 5px; border: solid gray 1px">
                        <!--<h6>Transfer Payment</h6>
                        <Label style="width: 130px"> Application # </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $loanApplicationNumberP;?>" name="loanApplicationNumberP" readonly><br>
                        <Label style="width: 130px"> Date </Label>
                        <input style="width: 150px" type="date" value = "<?php echo $datePaymentPL;?>" name="datePaymentPL"><br>
                        <Label style="width: 130px"> OR # </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $orNumberPL;?>" name="orNumberPL"><br>
                        <Label style="width: 130px"> Principal Amount </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $principalPaymentPL;?>" name="principalPaymentPL"><br>
                        <Label style="width: 130px"> Interest Amount </Label>
                        <input style="width: 150px" type="text" value = "<?php echo $interestPaymentPL;?>" name="interestPaymentPL"><br>
                        <button class="btn btn-outline-success my-2 my-sm-0" name = "transferPayment" value = "transferPayment">TRANSFER</button>-->
                    </div>
              </div>

                <button class="btn btn-outline-success my-2 my-sm-0" name = "printLedger" value = "printLedger">PRINT LEDGER</button>
                <input style="width: 150px;border: none;" type="text" value = "<?php  
                if($ledgerIdentifier == "SL"){
                    echo "Savings Ledger";
                }
                elseif($ledgerIdentifier == "SCL"){
                    echo "Share Capital Ledger";
                } 
                elseif($ledgerIdentifier == "LL"){
                    echo "Loan Ledger";
                }
                ?>" name="ledgerCaption"><br><br>
                <button class="btn btn-outline-success my-2 my-sm-0" name = "proceedPayment" value = "proceedPayment">PROCEED PAYMENT</button>

                <!--Savings Ledger-->
                <div class="table table-striped table-hover">
                        <?php
                        if($displayPropertySavings != "none"){
                            echo "<table>
                            <tr>
                                <th>SAVINGS LEDGER</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>  
                                <th></th>
                            </tr>
                            <tr>
                                <th>Transaction #</th>
                                <th>Type Transaction</th>
                                <th>Refernce Number</th>
                                <th>Amount</th>  
                                <th>Date Transaction</th>
                            </tr>";
                            
                            $counterhs = 0;
                            while($counterhs < $numRowS) {
                                    echo "<tr>";
                                        echo "<td>" . $transactionNumberS[$counterhs] . "</td>";
                                        echo "<td>" . $typeTransactionS[$counterhs] . "</td>";
                                        echo "<td>" . $referemceNumberS[$counterhs] . "</td>";
                                        echo "<td>" . number_format($amountS[$counterhs],'2','.',',') . "</td>";
                                        echo "<td>" . $dateTransactionS[$counterhs] . "</td>";
                                    echo "</tr>";
                                $counterhs ++;
                            }
                        }
                        ?>
                </div>

                <!--Share Capital Ledger-->
                <div class="table table-striped table-hover">
                        <?php
                        if($displayPropertySC != "none"){
                            echo "<table>
                            <tr>
                                <th>SHARE CAPITAL LEDGER</th>
                            </tr>
                            <tr>
                                <th>Transaction #</th>
                                <th>Type Transaction</th>
                                <th>Refernce Number</th>
                                <th>Amount</th>  
                                <th>Date Transaction</th>
                            </tr>";
                            
                            $counterhsc = 0;
                            while($counterhsc < $numRowSC) {
                                    echo "<tr>";
                                        echo "<td>" . $transactionNumberSC[$counterhsc] . "</td>";
                                        echo "<td>" . $typeTransactionSC[$counterhsc] . "</td>";
                                        echo "<td>" . $referemceNumberSC[$counterhsc] . "</td>";
                                        echo "<td>" . number_format($amountSC[$counterhsc],'2',',','.') . "</td>";
                                        echo "<td>" . $dateTransactionSC[$counterhsc] . "</td>";
                                    echo "</tr>";
                                $counterhsc ++;
                            }
                        } 
                        ?>
                </div>

                <!--Loan Ledger-->
                <div class="table table-striped table-hover">
                    <?php
                        if($displayPropertyLoan != "none" or $loanApplicationNumberId != ""){
                            if($idNumber != "" or $loanApplicationNumberId != ""){
                                echo "<table>
                                <tr>
                                    <th>List of Loan</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Loan Application Number</th>
                                    <th>Loan Service Name</th>
                                    <th>Loan Service ID</th>
                                    <th>Loan Date Application</th>
                                    <th>Loan Amount</th>
                                    <th>Loan Term</th>
                                    <th>Loan Status</th>
                                    <th></th>
                                </tr>";
                                
                                $counterh = 0;
                                $sumPrincipalRCL[] = 0;
                                while($counterh < $numRow) {
                                        echo "<tr>";
                                            echo "<td> <button type =" . "submit" . " " . "style=" . "width:70px;" . " " . "value=". $loanApplicationNumber[$counterh] . " " . "name=" . "myButton". ">"  . $loanApplicationNumber[$counterh] . " </button> </td>";
                                            if(substr($loanApplicationNumber[$counterh],0,3) == "RCL"){
                                                echo "<td>" . $riceInvoice[$counterh] . "</td>";
                                            }else{
                                                echo "<td>" . $loanName[$counterh] . "</td>";
                                            }
                                            
                                            $sumPrincipalRCL[$counterh] = $loanAmount[$counterh] + $interestAmount[$counterh];
                                            echo "<td>" . $loanServiceId[$counterh] . "</td>";
                                            echo "<td>" . $dateApplication[$counterh] . "</td>";
                                            echo "<td>" . number_format($sumPrincipalRCL[$counterh],'2','.',',') . "</td>";
                                            echo "<td>" . $loanTerm[$counterh] . "</td>";
                                            echo "<td>" . $loanStatus[$counterh] . "</td>";
                                        echo "</tr>";
                                    $counterh ++;
                                }
                                
                                if($typeInterestP == "Flat"){
                                    $monthDate->add(new DateInterval('P'.($loanTermP*30).'D'));
                                    if(substr("$loanApplicationNumberP", 0,3) == "RCL"){
                                        echo "<table>
                                        <tr>
                                            <th>Rice Loan Ledger</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th>Principal Loan</th>
                                            <th>Interest Loan Loan</th>
                                            <th>Due Date</th>
                                            <th>OR #</th>
                                            <th>Date Payment</th>
                                            <th>Principal Payment</th>
                                            <th>Interest Payment</th>
                                            <th>Total Balance</th>
                                            <th></th>
                                        </tr>";

                                        if($counterPayment == 0){
                                            $amountPaymentP[$counterPayment] = 0;
                                            $amountPI[$counterPayment] = 0;
                                            $counterPayment = 1;
                                        }

                                        $counterf = 0;
                                        $sumPrincipal = $loanAmountP + $loanInterestP;
                                        while($counterf < $counterPayment){
                                            $sumPrincipal = $sumPrincipal - ($amountPaymentP[$counterf] + $amountPI[$counterf]);
                                            //echo "$sumPrincipal"; echo " ";
                                            if($sumPrincipal <= 0){
                                              //echo "$loanApplicationNumberP";
                                              //echo "$loanApplicationNumberP";
                                              //echo "$idNumber";
                                              $status = "Paid";
                                              //echo "$loanApplicationNumberP";
                                              $sql = "UPDATE rice_loan_table SET
                                              loan_status = '$status'
                                              WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

                                              if ($conn->query($sql) === TRUE) {
                                                 $infomessage = "Loan Paid";
                                                 echo "$infomessage";
                                              } 
                                              else { 
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                              }
                                            }
                                            echo "<tr>";
                                                echo "<td>" . number_format($loanAmountP,'2','.',',') . "</td>";
                                                echo "<td>" . number_format($loanInterestP,'2','.',',') . "</td>";
                                                echo "<td>"; echo $monthDate->format('Y-m-d');  echo "</td>";
                                                echo "<td>" . $orNumber[$counterf] . "</td>";
                                                echo "<td>" . $datePaymentP[$counterf] . "</td>";
                                                echo "<td>" . number_format($amountPaymentP[$counterf],'2','.',',') . "</td>";
                                                echo "<td>" . number_format($amountPI[$counterf],'2','.',',') . "</td>";
                                                echo "<td>" . $sumPrincipal . "</td>";
                                                echo "<td></td>";
                                            echo "</tr>";
                                            $counterf ++;
                                        }
                                    }else{
                                        echo "<table>
                                        <tr>
                                            <th>Loan Ledger</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <th>Loan Amount</th>
                                            <th>Due Date</th>
                                            <th>Date of Payment</th>
                                            <th>Payment Amount</th>
                                            <th>Balance</th>
                                            <th></th>
                                        </tr>";

                                        if($counterPayment == 0){
                                            $amountPaymentP[$counterPayment] = 0;
                                            $counterPayment = 1;
                                        }

                                        $counterf = 0;
                                        $sumPrincipal = $loanAmountP;
                                        while($counterf < $counterPayment) {
                                            $sumPrincipal = $sumPrincipal - $amountPaymentP[$counterf];
                                            if($sumPrincipal<=0){
                                              if(substr($loanApplicationNumberP, 0,2) == "CL"){
                                                  $sql = "UPDATE cl_loan_table SET
                                                  loan_status = 'Paid'
                                                  WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

                                                  if ($conn->query($sql) === TRUE) {
                                                     $infomessage = "Loan Paid";
                                                  } 
                                                  else { 
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                  }
                                              }elseif(substr($loanApplicationNumberP, 0,3) == "EML"){
                                                  $sql = "UPDATE eml_loan_table SET
                                                  loan_status = 'Paid'
                                                  WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

                                                  if ($conn->query($sql) === TRUE) {
                                                     $infomessage = "Loan Paid";
                                                  } 
                                                  else { 
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                  }
                                              }elseif(substr($loanApplicationNumberP, 0,2) == "SL"){
                                                  $sql = "UPDATE sl_loan_table SET
                                                  loan_status = 'Paid'
                                                  WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberP' ";

                                                  if ($conn->query($sql) === TRUE) {
                                                     $infomessage = "Loan Paid";
                                                  } 
                                                  else { 
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                  }
                                              }
                                            }
                                            echo "<tr>";
                                                echo "<td>" . number_format($loanAmountP,'2','.',',') . "</td>";
                                                echo "<td>"; echo $monthDate->format('Y-m-d');  echo "</td>";
                                                echo "<td>" . $datePaymentP[$counterf] . "</td>";
                                                echo "<td>" . number_format($amountPaymentP[$counterf],'2','.',',') . "</td>";
                                                echo "<td>" . number_format($sumPrincipal[$counterf],'2','.',',') . "</td>";
                                                echo "<td></td>";
                                            echo "</tr>";
                                            $counterf ++;
                                        }
                                    }
                                }elseif($typeInterestP == "Diminishing"){
                                    $loanInterestP = $loanInterestP/100;

                                    $numberator = $loanAmountP*$loanInterestP;
                                    $denominator = 1-pow((1+$loanInterestP),-$loanTermP);
                                    $monthlyAmortization = $numberator / $denominator;

                                    $OSBalance = $loanAmountP;
                                    $totalPrincipal = 0;
                                    $totalInterest = 0;
                                    $actualInterest = 0;

                                    $actualPrincipal = 0;
                                    $actualInterest = 0;
                                    $actualBalanceTemp = 0;
                                    $actualBalance = $loanAmountP;

                                    $monthlyAmortization = round($monthlyAmortization,2,PHP_ROUND_HALF_DOWN);
                                    $interestPayment = $loanAmountP * $loanInterestP;

                                    //actual
                                    $actualInterest = $loanAmountP * $loanInterestP;

                                    if ($paymentTermP == "Daily") {
                                        $loanTermP = $loanTermP * 30;
                                        $paymentTerm = 30;
                                    }elseif ($paymentTermP == "Semi Monthly") {
                                        $loanTermP = $loanTermP * 2;
                                        $paymentTerm = 2;
                                    }
                                    elseif ($paymentTermP == "Monthly") {
                                        $loanTermP = $loanTermP * 1;  
                                        $paymentTerm = 1;
                                    }

                                    $monthlyAmortization = $monthlyAmortization / $paymentTerm;
                                    $monthlyAmortization = round($monthlyAmortization,2,PHP_ROUND_HALF_ODD);

                                    $interestPayment = $interestPayment / $paymentTerm;
                                    $interestPayment =  round($interestPayment,2,PHP_ROUND_HALF_ODD);

                                    //actual
                                    $actualInterest = $interestPayment / $paymentTerm;
                                    $actualInterest =  round($actualInterest,2,PHP_ROUND_HALF_ODD);

                                    echo "<br>";

                                    echo "<table>
                                    <tr>
                                        <th>Loan Ledger</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>  
                                        <th>Due Date</th>
                                        <th>Monthly Amortization</th>
                                        <th>Principal Payment</th>
                                        <th>Interest Payment</th>
                                        <th>O/S Balance</th>
                                        <th>Date of Payment</th>
                                        <th>OR #</th>
                                        <th>Amount</th>
                                        <th>Actual Principal</th>
                                        <th>Actual Interest</th>
                                        <th>Actual Balance</th>
                                    </tr>";
                                    
                                    $counterh = 0;
                                    //if(substr($loanApplicationNumberId, 0,2) == "PL"){
                                      //$counterPayment = $counterPayment + $counterPaymentPL;
                                      //$counterComparison = $counterPaymentPL;
                                    //}else{
                                      $counterComparison = $counterPayment;
                                    //}
                                    
                                    $sumPrincipal = 0;

                                    while($counterh < $loanTermP) {
                                        $check = $counterh + 1;

                                        $totalInterest = $totalInterest + $interestPayment;
                                        $principalPayment = round(($monthlyAmortization - $interestPayment),2,PHP_ROUND_HALF_ODD);

                                        $OSBalance = $OSBalance - $principalPayment;
                                        $OSBalanceTemp = round($OSBalance,2,PHP_ROUND_HALF_ODD);

                                        if($loanTermP == $check){
                                            if($OSBalanceTemp > 0){
                                                $OSBalanceTemp = 0;
                                            }elseif($OSBalanceTemp < 0){
                                                $OSBalanceTemp = 0;
                                            }
                                        }

                                        if($paymentTermP == "Monthly"){
                                            $monthDate->add(new DateInterval('P'.(30).'D'));
                                        }elseif($paymentTermP == "Semi Monthly"){
                                            $monthDate->add(new DateInterval('P'.(15).'D'));
                                        }else{
                                            $monthDate->add(new DateInterval('P'.(1).'D'));
                                        }

                                        if($counterh >= $counterComparison){
                                            $actualPrincipal = 0;
                                            $actualInterest = 0;
                                        }else{
                                            //Sum of Principal Payment
                                            $sumPrincipal = $sumPrincipal + $amountPaymentP[$counterh];

                                            //Total Payment //CHECK ERROR
                                            $amountPaymentPP[$counterh] = $amountPaymentP[$counterh] + $amountPI[$counterh];

                                            //Balance
                                            $amountBalance[$counterh] = $loanAmountP - $sumPrincipal;
                                            $amountBalance[$counterh] = round($amountBalance[$counterh],2,PHP_ROUND_HALF_ODD);

                                            //Next Balance
                                            $amountBalance[$counterh + 1] = $amountBalance[$counterh] + ($amountBalance[$counterh] * $loanInterestP);
                                            $amountBalance[$counterh + 1] = round($amountBalance[$counterh + 1],2,PHP_ROUND_HALF_ODD);

                                            if( ($counterh + 1) == $counterComparison){

                                                //nice
                                                $PLTemp = 0;

                                                if(substr($loanApplicationNumberId, 0,2) == "PL"){
                                                  $PLTemp = $counterPaymentPL;
                                                  //echo "string";
                                                }

                                                $evenNumber = ($counterh + 1 + $PLTemp)%2;
                                                $monthNumber = ($counterh + 1 + $PLTemp)%30;

                                                if( ($evenNumber == 1 and $paymentTerm == 2) or ($monthNumber > 0 and $paymentTerm == 30) ){
                                                  echo "$evenNumber";
                                                    $amountPI[$counterh + 1] = $amountPI[$counterh];
                                                }else{
                                                    $amountPI[$counterh + 1] = ($amountBalance[$counterh] * $loanInterestP)/$paymentTerm;
                                                    $amountPI[$counterh + 1] = round($amountPI[$counterh + 1],2,PHP_ROUND_HALF_ODD);
                                                }
                                            }

                                        }

                                        while($counterPayment < $loanTermP){
                                            $datePaymentP[$counterPayment] = "";
                                            $orNumber[$counterPayment] = "";
                                            $amountPaymentPP[$counterPayment] = 0;
                                            $amountPaymentP[$counterPayment] = 0;
                                            $amountPI[$counterPayment+1] = 0;
                                            
                                            $amountBalance[$counterPayment+1] = 0;
                                            $counterPayment++;
                                        }

                                        echo "<tr>"; 
                                            echo "<td>"; echo $monthDate->format('Y-m-d');  echo "</td>";
                                            echo "<td>" . number_format($monthlyAmortization,'2','.',',') . "</td>";
                                            echo "<td>" . number_format($principalPayment,'2','.',',') . "</td>";
                                            echo "<td>" . number_format($interestPayment,'2','.',',') . "</td>";
                                            echo "<td>" . number_format($OSBalanceTemp,'2','.',',') . "</td>";
                                            echo "<td>" . $datePaymentP[$counterh] . "</td>";
                                            echo "<td>" . $orNumber[$counterh] . "</td>";
                                            echo "<td>" . number_format($amountPaymentPP[$counterh],'2','.',',') . "</td>";
                                            echo "<td>" . number_format($amountPaymentP[$counterh],'2','.',',') . "</td>";
                                            echo "<td>" . number_format($amountPI[$counterh],'2','.',',') . "</td>";//CHECK ERROR
                                            if($amountBalance[$counterh] <= 0){
                                              if(substr($loanApplicationNumberP, 0,2) == "BL"){
                                                  $sql = "UPDATE bl_loan_table SET
                                                  loan_status = 'Paid'
                                                  WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberId' ";

                                                  if ($conn->query($sql) === TRUE) {
                                                     $infomessage = "Loan Paid";
                                                  } 
                                                  else { 
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                  }
                                              }elseif(substr($loanApplicationNumberP, 0,3) == "CLL"){
                                                  if($countErr == 0){
                                                      $sql = "UPDATE cl_loan_table SET
                                                      loan_status = 'Paid'
                                                      WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberId' ";

                                                      if ($conn->query($sql) === TRUE) {
                                                         $infomessage = "Record updated successfully";
                                                         //echo "$infomessage";
                                                      } 

                                                      else { 
                                                            echo "Error: " . $sql . "<br>" . $conn->error;
                                                      }
                                                  }else{
                                                      echo "Fill up empty field";
                                                  }
                                              }elseif(substr($loanApplicationNumberP, 0,3) == "EDL"){
                                                  $sql = "UPDATE edl_loan_table SET
                                                  loan_status = 'Paid'
                                                  WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberId' ";

                                                  if ($conn->query($sql) === TRUE) {
                                                     $infomessage = "Loan Paid";
                                                  } 
                                                  else { 
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                  }
                                              }elseif(substr($loanApplicationNumberP, 0,2) == "RL"){
                                                  $sql = "UPDATE rl_loan_table SET
                                                  loan_status = 'Paid'
                                                  WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberId' ";

                                                  if ($conn->query($sql) === TRUE) {
                                                     $infomessage = "Loan Paid";
                                                  } 
                                                  else { 
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                  }
                                              }elseif(substr($loanApplicationNumberP, 0,2) == "PL"){
                                                  $sql = "UPDATE pl_loan_table SET
                                                  loan_status = 'Paid'
                                                  WHERE id_number = '$idNumber' and loan_application_number =  '$loanApplicationNumberId' ";

                                                  if ($conn->query($sql) === TRUE) {
                                                     $infomessage = "Loan Paid";
                                                  } 
                                                  else { 
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                  }
                                              }
                                            }
                                            echo "<td>" . number_format($amountBalance[$counterh],'2','.',',') . "</td>";
                                        echo "</tr>";

                                        $counterh ++;
                                        
                                        if($paymentTermP == "Semi Monthly"){
                                            $identifier = $counterh % 2;
                                            if($identifier == 1){
                                                $interestPayment = $interestPayment;
                                            }else{
                                                $interestPayment = round($OSBalanceTemp * $loanInterestP,2,PHP_ROUND_HALF_ODD);
                                                $interestPayment = $interestPayment / $paymentTerm;
                                            }
                                            
                                        }elseif($paymentTermP == "Daily"){
                                            $identifier = (($counterh+1) % 30);
                                            if($identifier >= 1){
                                                $interestPayment = $interestPayment;
                                            }else{
                                                $interestPayment = round($OSBalanceTemp * $loanInterestP,2,PHP_ROUND_HALF_ODD);
                                                $interestPayment = $interestPayment / $paymentTerm;
                                            }
                                        }
                                        else{
                                            $interestPayment = round($OSBalanceTemp * $loanInterestP,2,PHP_ROUND_HALF_ODD);
                                            $interestPayment = $interestPayment / $paymentTerm;
                                        }
                                        
                                        $interestPayment = round($interestPayment,2,PHP_ROUND_HALF_ODD);
                                        $OSBalance = round($OSBalanceTemp,2,PHP_ROUND_HALF_ODD);

                                        $totalPrincipal = $totalPrincipal + $principalPayment;
                                    }

                                    if($totalInterest != 0 or $totalPrincipal !=0){
                                        $actualInterest = round(($totalInterest/$totalPrincipal) * 100);
                                    }

                                     $monthlyAmortization = $monthlyAmortization * $loanTermP;
                                     echo "<tr>";
                                        echo "<td>" . "" . " </button> </td>";
                                        echo "<td>" . number_format($monthlyAmortization,'2','.',',') . "</td>";
                                        echo "<td>" . number_format($totalPrincipal,'2','.',',') . "</td>";
                                        echo "<td>" . number_format($totalInterest,'2','.',',') . "</td>";
                                        echo "<td>" . "" . " </button> </td>";
                                        echo "<td>" . "" . " </button> </td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </form>
  </div>
</body>
    <?php include "css1.html" ?>
</html>