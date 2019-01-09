
<?php  
    
if($idNumberS == ""){
    if (!empty($_POST["searchMember"])) {
        $searchMember = test_input($_POST["searchMember"]);
    }

    if (!empty($_POST["myButton"])) {
        $loanApplicationNumberId = test_input($_POST["myButton"]);
    }

    if (!empty($_POST["paidLoan"])) {
        $paidLoan = test_input($_POST["paidLoan"]);
    }

    if (!empty($_POST["postPayment"])) {
        $postPayment = test_input($_POST["postPayment"]);
    }

    if (!empty($_POST["typePayment"])) {
        $typePayment = test_input($_POST["typePayment"]);
    }

    if (!empty($_POST["exitB"])) {
        $exitB = test_input($_POST["exitB"]);
    }

	if (empty($_POST["idNumber"])) {
	  	$countErr++;
	}else {
    	$idNumber = test_input($_POST["idNumber"]);
  	}

    if (empty($_POST["referencenumber"])) {
        $countErr++;
    }else {
        $referencenumber = test_input($_POST["referencenumber"]);
    }

    if (!empty($_POST["loanApplicationNumberP"])) {
        $loanApplicationNumberP = test_input($_POST["loanApplicationNumberP"]);
    }

    if (empty($_POST["typePaymentCCHK"]) && !is_numeric($_POST["typePaymentCCHK"])) {
        $countErr++;
    }else {
        $typePaymentCCHK = test_input($_POST["typePaymentCCHK"]);
    }

    if (empty($_POST["datePayment"])) {
        $countErr++;
    }else {
        $datePayment = test_input($_POST["datePayment"]);
    }

    if (!empty($_POST["loanInterestP"])) {
        $loanInterestP = test_input($_POST["loanInterestP"]);
    }

    if (!empty($_POST["typeInterestP"])) {
        $typeInterestP = test_input($_POST["typeInterestP"]);
    }

    if (!empty($_POST["paymentTermP"])) {
        $paymentTermP = test_input($_POST["paymentTermP"]);
    }

    if (!empty($_POST["loanAmountP"]) ) {
        $loanAmountP = test_input($_POST["loanAmountP"]);
    }

    if (empty($_POST["savingsDeposit"]) && !is_numeric($_POST["savingsDeposit"])) {
        $countErr++;
    }else {
        $savingsDeposit = test_input($_POST["savingsDeposit"]);
    }

    if (empty($_POST["timeDeposit"]) && !is_numeric($_POST["timeDeposit"])) {
        $countErr++;
    }else {
        $timeDeposit = test_input($_POST["timeDeposit"]);

        if($timeDeposit > 0){
            if (empty($_POST["depositReference"]) && !is_numeric($_POST["depositReference"])) {
                $countErr++;
            }else {
                $depositReference = test_input($_POST["depositReference"]);
            }

            if (empty($_POST["depositInterest"]) && !is_numeric($_POST["depositInterest"])) {
                $countErr++;
            }else {
                $depositInterest = test_input($_POST["depositInterest"]);
            }

            if (empty($_POST["depositTerm"]) && !is_numeric($_POST["depositTerm"])) {
                $countErr++;
            }else {
                $depositTerm = test_input($_POST["depositTerm"]);
            }
        }
    }

    if (empty($_POST["fixedDeposit"]) && !is_numeric($_POST["fixedDeposit"])) {
        $countErr++;
    }else {
        $fixedDeposit = test_input($_POST["fixedDeposit"]);
        if($fixedDeposit > 0){
            if (empty($_POST["depositReference"]) && !is_numeric($_POST["depositReference"])) {
                $countErr++;
            }else {
                $depositReference = test_input($_POST["depositReference"]);
            }

            if (empty($_POST["depositInterest"]) && !is_numeric($_POST["depositInterest"])) {
                $countErr++;
            }else {
                $depositInterest = test_input($_POST["depositInterest"]);
            }

            if (empty($_POST["depositTerm"]) && !is_numeric($_POST["depositTerm"])) {
                $countErr++;
            }else {
                $depositTerm = test_input($_POST["depositTerm"]);
            }
        }
    }

    if (empty($_POST["cbuDeposit"]) && !is_numeric($_POST["cbuDeposit"])) {
        $countErr++;
    }else {
        $cbuDeposit = test_input($_POST["cbuDeposit"]);
    }

    if (empty($_POST["rcfPayment"]) && !is_numeric($_POST["rcfPayment"])) {
        $countErr++;
    }else {
        $rcfPayment = test_input($_POST["rcfPayment"]);

        if($rcfPayment > 0){
            if (empty($_POST["invoiceNumber"])) {
                $countErr++;
            }else {
                $invoiceNumber = test_input($_POST["invoiceNumber"]);
            }

            if (empty($_POST["quantityCash"])) {
                $countErr++;
            }else {
                $quantityCash = test_input($_POST["quantityCash"]);
            }
        }
    }

    if (empty($_POST["rcfPaymentI"]) && !is_numeric($_POST["rcfPaymentI"])) {
        $countErr++;
    }else {
        $rcfPaymentI = test_input($_POST["rcfPaymentI"]);
    }

    if (!empty($_POST["withdrawSavings"]) ) {
        $withdrawSavings = test_input($_POST["withdrawSavings"]);
    }

    if (!empty($_POST["withdrawShareCapital"]) ) {
        $withdrawShareCapital = test_input($_POST["withdrawShareCapital"]);
    }

    if (!empty($_POST["CBURecruit"]) ) {
        $CBURecruit = test_input($_POST["CBURecruit"]);
    }

    if (!empty($_POST["withdrawTimeDeposit"]) ) {
        $withdrawTimeDeposit = test_input($_POST["withdrawTimeDeposit"]);
    }

    if (!empty($_POST["withdrawFixedDeposit"]) ) {
        $withdrawFixedDeposit = test_input($_POST["withdrawFixedDeposit"]);
    }

    if (!empty($_POST["idNumberSearch"]) ) {
        $idNumberSearch = test_input($_POST["idNumberSearch"]);
    }

    if (empty($_POST["mbfPayment"]) && !is_numeric($_POST["mbfPayment"])) {
        $countErr++;
    }else {
        $mbfPayment = test_input($_POST["mbfPayment"]);
    }

    if (empty($_POST["scfPayment"]) && !is_numeric($_POST["scfPayment"])) {
        $countErr++;
    }else {
        $scfPayment = test_input($_POST["scfPayment"]);
    }

    if (empty($_POST["plfPayment"]) && !is_numeric($_POST["plfPayment"])) {
        $countErr++;
    }else {
        $plfPayment = test_input($_POST["plfPayment"]);
    }

    if (empty($_POST["pnfPayment"]) && !is_numeric($_POST["pnfPayment"])) {
        $countErr++;
    }else {
        $pnfPayment = test_input($_POST["pnfPayment"]);
    }

    if (empty($_POST["msfPayment"]) && !is_numeric($_POST["msfPayment"])) {
        $countErr++;
    }else {
        $msfPayment = test_input($_POST["msfPayment"]);
    }

    if (empty($_POST["ptfPayment"]) && !is_numeric($_POST["ptfPayment"])) {
        $countErr++;
    }else {
        $ptfPayment = test_input($_POST["ptfPayment"]);
    }

    if (empty($_POST["rifPayment"]) && !is_numeric($_POST["rifPayment"])) {
        $countErr++;
    }else {
        $rifPayment = test_input($_POST["rifPayment"]);
    }

    if (empty($_POST["rrfPayment"]) && !is_numeric($_POST["rrfPayment"])) {
        $countErr++;
    }else {
        $rrfPayment = test_input($_POST["rrfPayment"]);
    }

    if (empty($_POST["tffPayement"]) && !is_numeric($_POST["tffPayement"])) {
        $countErr++;
    }else {
        $tffPayement = test_input($_POST["tffPayement"]);
    }

    if (empty($_POST["blLA"]) && !is_numeric($_POST["blLA"])) {
        $countErr++;
    }else {
        $blLA = test_input($_POST["blLA"]);
    }

    if (empty($_POST["blPayment"]) && !is_numeric($_POST["blPayment"])) {
        $countErr++;
    }else {
        $blPayment = test_input($_POST["blPayment"]);
    }

    if (empty($_POST["chklLA"]) && !is_numeric($_POST["chklLA"])) {
        $countErr++;
    }else {
        $chklLA = test_input($_POST["chklLA"]);
    }

    if (empty($_POST["chklPayment"]) && !is_numeric($_POST["chklPayment"])) {
        $countErr++;
    }else {
        $chklPayment = test_input($_POST["chklPayment"]);
    }

    if (empty($_POST["cllLA"]) && !is_numeric($_POST["cllLA"])) {
        $countErr++;
    }else {
        $cllLA = test_input($_POST["cllLA"]);
    }

    if (empty($_POST["cllPayment"]) && !is_numeric($_POST["cllPayment"])) {
        $countErr++;
    }else {
        $cllPayment = test_input($_POST["cllPayment"]);
    }

    if (empty($_POST["clLA"]) && !is_numeric($_POST["clLA"])) {
        $countErr++;
    }else {
        $clLA = test_input($_POST["clLA"]);
    }

    if (empty($_POST["clPayment"]) && !is_numeric($_POST["clPayment"])) {
        $countErr++;
    }else {
        $clPayment = test_input($_POST["clPayment"]);
    }

    if (empty($_POST["cmlLA"]) && !is_numeric($_POST["cmlLA"])) {
        $countErr++;
    }else {
        $cmlLA = test_input($_POST["cmlLA"]);
    }

    if (empty($_POST["cmlPayment"]) && !is_numeric($_POST["cmlPayment"])) {
        $countErr++;
    }else {
        $cmlPayment = test_input($_POST["cmlPayment"]);
    }

    if (empty($_POST["edlLA"]) && !is_numeric($_POST["edlLA"])) {
        $countErr++;
    }else {
        $edlLA = test_input($_POST["edlLA"]);
    }

    if (empty($_POST["edlPayment"]) && !is_numeric($_POST["edlPayment"])) {
        $countErr++;
    }else {
        $edlPayment = test_input($_POST["edlPayment"]);
    }

    if (empty($_POST["emlLA"]) && !is_numeric($_POST["emlLA"])) {
        $countErr++;
    }else {
        $emlLA = test_input($_POST["emlLA"]);
    }

    if (empty($_POST["emlPayment"]) && !is_numeric($_POST["emlPayment"])) {
        $countErr++;
    }else {
        $emlPayment = test_input($_POST["emlPayment"]);
    }

    if (empty($_POST["rlLA"]) && !is_numeric($_POST["rlLA"])) {
        $countErr++;
    }else {
        $rlLA = test_input($_POST["rlLA"]);
    }

    if (empty($_POST["rlPayment"]) && !is_numeric($_POST["rlPayment"])) {
        $countErr++;
    }else {
        $rlPayment = test_input($_POST["rlPayment"]);
    }

    if (empty($_POST["slLA"]) && !is_numeric($_POST["slLA"])) {
        $countErr++;
    }else {
        $slLA = test_input($_POST["slLA"]);
    }

    if (empty($_POST["slPayment"]) && !is_numeric($_POST["slPayment"])) {
        $countErr++;
    }else {
        $slPayment = test_input($_POST["slPayment"]);
    }

    if (empty($_POST["plLA"]) && !is_numeric($_POST["plLA"])) {
        $countErr++;
    }else {
        $plLA = test_input($_POST["plLA"]);
    }

    if (empty($_POST["plPayment"]) && !is_numeric($_POST["plPayment"])) {
        $countErr++;
    }else {
        $plPayment = test_input($_POST["plPayment"]);
    }

    if (empty($_POST["pliPayment"]) && !is_numeric($_POST["pliPayment"])) {
        $countErr++;
    }else {
        $pliPayment = test_input($_POST["pliPayment"]);
    }

    if (!empty($_POST["paymentCount"])) {
        $paymentCount = test_input($_POST["paymentCount"]);
    }else {
        //$paymentCount = test_input($_POST["paymentCount"]);
    }

    if (empty($_POST["rclLA"]) && !is_numeric($_POST["rclLA"])) {
        $countErr++;
    }else {
        $rclLA = test_input($_POST["rclLA"]);
    }

    if (empty($_POST["rclPayment"]) && !is_numeric($_POST["rclPayment"])) {
        $countErr++;
    }else {
        $rclPayment = test_input($_POST["rclPayment"]);

        if($rclPayment > 0){
            if (empty($_POST["quantity"]) && !is_numeric($_POST["quantity"])) {
                $countErr++;
            }else {
                $quantity = test_input($_POST["quantity"]);
            }

            if (empty($_POST["invoiceNumberP"]) && !is_numeric($_POST["invoiceNumberP"])) {
                $countErr++;
            }else {
                $invoiceNumberP = test_input($_POST["invoiceNumberP"]);
            }
        }
    }

    if (empty($_POST["rclPPayment"]) && !is_numeric($_POST["rclPPayment"])) {
        $countErr++;
    }else {
        $rclPPayment = test_input($_POST["rclPPayment"]);
    }

    if (empty($_POST["infPayment"]) && !is_numeric($_POST["infPayment"])) {
        $countErr++;
    }else {
        $infPayment = test_input($_POST["infPayment"]);
    }

    if (empty($_POST["rbfPayment"]) && !is_numeric($_POST["rbfPayment"])) {
        $countErr++;
    }else {
        $rbfPayment = test_input($_POST["rbfPayment"]);
    }

    if (empty($_POST["totalPayment"]) && !is_numeric($_POST["totalPayment"])) {
        $countErr++;
    }else {
        $totalPayment = test_input($_POST["totalPayment"]);
    }

    if (!empty($_POST["cashRegister"]) ) {
        $cashRegister = test_input($_POST["cashRegister"]);
    }


    if($exitB == "exitB"){
        session_destroy();
        header("Location: http://localhost/projectkikz/samplemwmmpc/application/views/home/login.php");
    }

    if($cashRegister == "cashRegister"){
        header("Location: http://system.local/cashierDailyReport.php");
    }

    if($postPayment == "postPayment"){
        $totalPayment = $mbfPayment + $scfPayment + $cbuDeposit + $savingsDeposit + $timeDeposit + $plfPayment + $pnfPayment + $msfPayment + $rcfPayment + $rcfPaymentI + $ptfPayment + $rifPayment + $rrfPayment + $tffPayement + $blPayment + $chklPayment + $cllPayment + $clPayment + $cmlPayment + $edlPayment + $emlPayment + $rlPayment + $slPayment + $plPayment + $pliPayment + $rclPayment + $rclPPayment + $infPayment + $rbfPayment + $fixedDeposit;
    }
}

if($idNumberS != ""){
    $idNumberSearch = $idNumberS;
    $typePaymentCCHK = 0;
}

?>