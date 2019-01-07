<?php  
//COMMENT
//TRIAL
require_once 'session.php';
require ("function.php");

$idNumber [] = "";
$accountNumber [] = "";

$firstName  [] = "";
$middleName [] = "";
$lastName [] = "";

$transactionnumber[] = "";
$loanApplicationNumber[] = "";
$voucherNumber[] = "";
//$orNumber[] = 0;
//cr
$serviceFee[] = 0;
$fillingFee[] = 0;
$notarialFee[] = 0;
//$PrincipalFee[] = 0;
$insuranceFee[] = 0;
$interestRevenue[] = 0;
$dateTransaction[] = "";
$scAmount[] = 0;
$sdAmount[] = 0;


//reloan cr
$loanBalance[] = 0;
$riceLoan[] = 0;
$loanPenalty[] = 0;
$ricePenalty[] = 0;

//Exp dr
$expenses[] = 0;
$loanRelease[] = 0;
$loanAmount[] = 0;

$cr_dr=[];
$accountExpense=[];


$totalServiceFee = 0;
$totalFillinfFee = 0;
$totalNotarialFee = 0;
$totalInsuranceFee = 0;
$totalPrincipal = 0;
$totalInterestRevenue = 0;
$totalscAmount = 0;
$totalsdAmount = 0;
$totalLoanBalance = 0;
$totalLoanPenalty = 0;
$totalRiceBalance = 0;
$totalRicePenalty = 0;

$totalLoanAmount = 0;
$totalLoanRelease = 0;
$totalExpenses = 0;

$startDate = date('Y-m-d');
$endDate = date('Y-m-d');
$releaseDate = "";

$searchReport = "";
$printReport = "";
$numRow = "";

$exitB = "";

$countErr = 0;

$fullNameD[] = "";
$clearOR = "";
require('public/fpdf181/fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["searchReport"])) {
        $searchReport = test_input($_POST["searchReport"]);
    }

    if (!empty($_POST["printReport"])) {
        $printReport = test_input($_POST["printReport"]);
    }

    if (!empty($_POST["exitB"])) {
        $exitB = test_input($_POST["exitB"]);
    }

    if (!empty($_POST["clearOR"])) {
        $clearOR = test_input($_POST["clearOR"]);
    }

    if (empty($_POST["startDate"])) {
        $countErr++;
    }else {
        $startDate = test_input($_POST["startDate"]);
    }

    if (empty($_POST["endDate"])) {
        $countErr++;
    }else {
        $endDate = test_input($_POST["endDate"]);
    }

    if($exitB == "exitB"){
        session_destroy();
    }

    /*if($searchReport == "searchReport" or $printReport == "printReport"){
        $cl[] = 0;
        $lb[] = 0;
        $pnl[] = 0;
        $pnr[] = 0;
        $rcln[] = 0;
        $exp[] = 0;
        $cbur[] = 0;
        $sdr[] = 0;
        $tdw[] = 0;
        $fdw[] = 0;
        $cbuw[] = 0;
        $voucherNumberD[] = "";
        $dateTransactionD[] = "";
        $idNumberD[] = "";
        $counter = 0;

        $counterD = 0;

        $listcd=[];
        $cdflaginfo=[];
        $listcd = getCDInfo($startDate, $endDate, $conn);
        $limit = $count($listcd);
        $i=0;
        $larr=[];
        $darr=[];
        $larrcon=[];
        $darrcon=[];

        while($i<$limit){
            $cdflaginfo=$listcd[$i];
            $voucherNumberD[$i] = $listcd[1];
            $idNumberD[$i] = $listcd[2];
            $dateTransactionD[$counterD] = $listcd[3];

            $exp[$i] = $listcd[5];


            $cl[$i] = $listcd[6];
            $lb[$i] = $listcd[7];
            $pnl[$i] = $listcd[8];
            $pnr[$i] = $listcd[9];

            $rcln[$i] = $listcd[10];
            $rcln_value[$i] = $listcd[25];

            $cbur[$i] = $listcd[11];

            $sdr[$i] = $listcd[12];
            $tdw[$i] = $listcd[13];
            $fdw[$i] = $listcd[14];

            $dcounter = 12;
            while($pcounter < 15){
                array_push($darr, $listtd[$dcounter]);
            }
            $darrcon[$i]=$darr;

            $lcounter = 15;
            while($lcounter < 25){
                array_push($larr, $listtd[$pcounter]);
            }
            $larrcon[$i]=$larr;
            
            $i++;
        }

        $numRow = $i;

        $x=0;
        $ltable="";
        $dlist=[];
        while($x<$numRow){
            if ($cl[$x]==1){
                $tc = getLoanTransactionCode($larrcon[$x]);
                if($tc != "PD"){
                    $ltable = getLoanInterestTableName($tc);
                    $dlist = getLoanInfoI($ltable,$voucherNumberD[$x],$idNumberD[$x],$conn);

                    $transactionnumber[$x] = $dlist[0];
                    $idNumber[$x] = $dlist[1];
                    $loanApplicationNumber[$x] = $dlist[2];
                    $voucherNumber[$x] = $dlist[3];
                    $dateTransaction[$x] = $dlist[6];

                    $serviceFee[$x] = $dlist[8];
                    $fillingFee[$x] = $dlist[9];
                    $notarialFee[$x] = $dlist[10];
                    $insuranceFee[$x] = $dlist[11];
                    $interestRevenue[$x] = $dlist[12];

                    //LOAN RELEASE
                    $loanRelease[$x] = $dlist[16];

                    //RELOAN LB
                    $loanBalance[$x] = $dlist[13];

                    //RELOAN RCL
                    $riceLoan[$x]= $rcln_value[$i];
                    
                    $expenses[$x] = 0;
                    $cr_dr[$x] = "";
                    $accountExpense[$x] = "";


                    //RETENTION SDR 
                    if($sdr[$x]==1){
                        $dtable = getDepositTable("SD");
                        $sdinfo = getDepositInfo($dtable, $idNumberD[$x], $voucherNumberD[$x], 6, $conn);
                        $sdAmount[$x] = $row['$sdinfo'];
                    }

                    //RETENTION SCR 
                    if($cbur[$x]==1){
                        $sctable = getTableName("SC");
                        $scinfo = getSCInfo($sctable, $idNumberD[$x], $voucherNumberD[$x], 5, $conn);
                        $scAmount[$x] = $row['$scinfo'];
                    }

                    //PNR
                    if($pnr[$x]==1){
                        $oitable = getTableName("OI");
                        $oiinfo = getOIInfo($oitable, $idNumberD[$x], $voucherNumberD[$x], "plti",4, $conn);
                        $ricePenalty[$x] = $row['$oiinfo'];
                    }

                    //PNR
                    if($pnl[$x]==1){
                        $oitable = getTableName("OI");
                        $oiinfo = getOIInfo($oitable, $idNumberD[$x], $voucherNumberD[$x], "pnti", 4, $conn);
                        $ricePenalty[$x] = $row['$oiinfo'];
                    }

                    $loanAmount[$x] = $loanRelease[$x] + $serviceFee[$x] + $fillingFee[$x] + $notarialFee[$x] + $insuranceFee[$x] + $interestRevenue[$x] + $loanBalance[$x] + $riceLoan[$x] + $loanPenalty[$x] + $ricePenalty[$x] + $sdAmount[$x] + $scAmount[$x];

                    $minfo=[];
                    $minfo=seaarchMember($idNumber[$x], 5, $conn);
                    $firstName[$x] = $minfo[1];
                    $middleName[$x] = $minfo[2];
                    $lastName[$x] = $minfo[3];
                    $fullNameD[$x] = $lastName[$x] . ", " . $middleName[$x] . $firstName[$x];

                    $totalServiceFee = $totalServiceFee + $serviceFee[$x];
                    $totalFillinfFee = $totalFillinfFee + $fillingFee[$x];
                    $totalNotarialFee = $totalNotarialFee + $notarialFee[$x];
                    $totalInsuranceFee = $totalInsuranceFee + $insuranceFee[$x];
                    $totalInterestRevenue = $totalInterestRevenue + $interestRevenue[$x];
                    $totalscAmount = $totalscAmount  + $scAmount[$x];
                    $totalsdAmount = $totalsdAmount  + $sdAmount[$x];

                    $totalLoanBalance = $totalLoanBalance + $loanBalance[$x];
                    $totalLoanPenalty = $totalLoanPenalty + $loanPenalty[$x];

                    $totalRiceBalance = $totalRiceBalance + $riceLoan[$x];
                    $totalRicePenalty = $totalRicePenalty + $ricePenalty[$x];

                    $totalLoanAmount = $totalLoanAmount + $loanAmount[$x];
                    $totalLoanRelease = $totalLoanRelease + $loanRelease[$x];
                }
            }else{
                $loanApplicationNumber[$x] = "";
                $serviceFee[$x] = 0;
                $fillingFee[$x] = 0;
                $notarialFee[$x] = 0;
                $insuranceFee[$x] = 0;
                $interestRevenue[$x] = 0;
                $loanBalance[$x] = 0;
                $sdAmount[$x] = 0;
                $scAmount[$x] = 0;
                $ricePenalty[$x] = 0;
                $loanPenalty[$x] = 0;
                $riceLoan[$x] = 0;
                $loanRelease[$x] = 0;
                $loanAmount[$x] = 0;
            }

            if($exp[$x] ==1 or $tdw[$x] == 1 or $fdw[$x] == 1 or $cbuw[$x] == 1){
                if($exp[$x] == 1){
                    $actable=getTableName("AC");
                    $acarr=[];
                    $acarr=getCAInfo($actable, $id, $referencenumber, 5 ,$conn);
                    $transactionnumber[$x] = $acarr[0];
                    $idNumber[$x] = $acarr[3];
                    $cr_dr[$x] = $acarr[4];
                    $accountExpense[$x] = $acarr[5];
                    $expenses[$x] = $acarr[6];
                    $voucherNumber[$x] = $acarr[7];
                    $loanApplicationNumber[$x] = $acarr[10];
                    $dateTransaction[$x] = $acarr[11];
                    
                    $catable=getTableName("AC");
                    $caarr=[];
                    $caarr=getChartAccountInfo($actable,'$idNumber[$x]', 5, $conn);
                    $numberCode = $caarr[1];
                    $fullNameD[$x] = $caarr[4];
                    
                    $idNumber[$x] = $idNumber[$x] . $numberCode; 
                    $totalExpenses = $totalExpenses + $expenses[$x];
                }

                //W TD FD
                if($tdw[$x] == 1 or $fdw[$x] == 1){
                    $dcode="";
                    if($tdw[$x] == 1){
                        $dcode=getDepositTable("TD");
                        $loanApplicationNumber[$x] = 'Withdraw Time Deposit';
                    }else if($fdw[$x] == 1){
                        $dcode=getDepositTable("FD");
                        $loanApplicationNumber[$x] = 'Withdraw Fixed Deposit';
                    }
                    $darrinfo=[];
                    $darrinfo=getDepositInfo($dcode, $idNumberD[$x], $voucherNumberD[$x], 5, $ts, $conn);
                    $transactionnumber[$x] = $darrinfo[0];
                    $idNumber[$x] = $darrinfo[1];
                    $voucherNumber[$x] = $darrinfo[4];
                    $expenses[$x] = $darrinfo[6];
                    $dateTransaction[$x] = $darrinfo[7];
                    

                    $minfo=[];
                    $minfo=seaarchMember($idNumber[$x], 5, $conn);
                    $firstName[$x] = $minfo[1];
                    $middleName[$x] = $minfo[2];
                    $lastName[$x] = $minfo[3];
                }

                //W CBU
                if($cbuw[$x] == 1){
                    $sccode="";
                    $sccode=getDepositTable("SC");
                    $darrinfo=[];
                    $darrinfo=getDepositInfo($sccode, $idNumberD[$x], $voucherNumberD[$x], 5, $ts, $conn);
                    $transactionnumber[$x] = $darrinfo[0];
                    $idNumber[$x] = $darrinfo[1];
                    $voucherNumber[$x] = $darrinfo[3];
                    $expenses[$x] = $darrinfo[5];
                    $dateTransaction[$x] = $darrinfo[6];
                    $loanApplicationNumber[$x] = 'Withdraw Share Capital';

                    $minfo=[];
                    $minfo=seaarchMember($idNumber[$x], 5, $conn);
                    $firstName[$x] = $minfo[1];
                    $middleName[$x] = $minfo[2];
                    $lastName[$x] = $minfo[3];
                }
            }else{

            }
        }
    }*/

    if($clearOR == "clearOR"){
        $cdlist=[];
        $cdinfo=[];
        $rtable=getTableName("CD");
        $delid=getRepID($rtable,$clearOR,$conn);
        $cdlist=getJEInfoD($clearOR, $delid, $conn);
        $cdcount=count($cdlist);
        $cdcounter=0;

        while($cdcounter<$cdcount){
            $cdinfo=$jelist[$cdcounter];
            if($cdinfo[5]==1){
                $actable=getTableName("AC");
                deleteOtherPayment($actable, $clearOR, $delid, $conn);
                
            }


            if($cdinfo[6]==1){
                $deptable=getDepositTable("SD");
                deleteOtherPayment($deptable, $clearOR,  $delid, $conn);
            }

            if($cdinfo[7]==1){
                $sctable=getTableName("SC");
                deleteOtherPayment($sctable, $clearOR,  $delid, $conn);
            }

            if($cdinfo[8]==1){
                $oitable=getTableName("OI");
                deleteOtherPayment($oitable, $clearOR,  $delid, $conn);
            }

            if($cdinfo[9]==1){
                $oitable=getTableName("OI");
                deleteOtherPayment($oitable, $clearOR,  $delid, $conn);
            }

            if($cdinfo[10]==1){
                $oitable=getTableName("OI");
                deleteOtherPayment($oitable, $clearOR,  $delid, $conn);
            }

            if($cdinfo[11]==1){
                $oitable=getTableName("OI");
                deleteOtherPayment($oitable, $clearOR,  $delid, $conn);
            }

            if($cdinfo[13]==1){
                $ltable = getLoanTableName("BL");
                $ptable = getLoanPrincipalTableName("BL");
                $itable = getLoanInterestTableName("BL");
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }

                deleteLoanPaymentD($ptable, $itable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[14]==1){
                $code="BL";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }

                deleteLoanPaymentD($ptable, $itable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[15]==1){
                $code="CLL";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }

                deleteLoanPaymentD($ptable, $itable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[15]==1){
                $code="CML";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }

                deleteLoanPaymentD($ptable, $itable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[16]==1){
                $code="EDL";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }

                deleteLoanPaymentD($ptable, $itable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[17]==1){
                $code="RL";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }

                deleteLoanPaymentD($ptable, $itable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[18]==1){
                $code="PL";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }

                deleteLoanPaymentD($ptable, $itable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[19]==1){
                $code="CL";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }
                deleteLoanPaymentF($ptable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[20]==1){
                $code="CKL";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }
                deleteLoanPaymentF($ptable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[21]==1){
                $code="EML";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }
                deleteLoanPaymentF($ptable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[21]==1){
                $code="SL";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }
                deleteLoanPaymentF($ptable, $clearOR, $delid ,$conn);
            }

            if($cdinfo[22]==1){
                $code="RCL";
                $ltable = getLoanTableName($code);
                $ptable = getLoanPrincipalTableName($code);
                $itable = getLoanInterestTableName($code);
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }
                deleteLoanPaymentD($ptable, $itable, $clearOR, $delid ,$conn);    
            }

            $jetable=getTableName("JE");
            deleteOtherPayment($jetable, $clearOR,  $delid, $conn);
            $cdcounter++;
        }
    }

    if($searchReport == "searchReport" or $printReport == "printReport"){
        $cl[] = 0;
        $lb[] = 0;
        $pnl[] = 0;
        $pnr[] = 0;
        $rcln[] = 0;
        $exp[] = 0;
        $cbur[] = 0;
        $sdr[] = 0;
        $tdw[] = 0;
        $fdw[] = 0;
        $cbuw[] = 0;
        $voucherNumberD[] = "";
        $dateTransactionD[] = "";
        $idNumberD[] = "";
        $counter = 0;

        $counterD = 0;

        $sqlNameD = "SELECT * FROM  disbursement_table WHERE date_transaction >='$startDate' and date_transaction <='$endDate' order by reference_number  asc";
        $resultNameD = $conn->query($sqlNameD);
        $numRow = mysqli_num_rows($resultNameD);

        if($resultNameD->num_rows > 0){
            while ($row = mysqli_fetch_array($resultNameD)) {
                $exp[$counterD] = $row['ac'];
                $cl[$counterD] = $row['cl'];
                $lb[$counterD] = $row['lb'];
                $pnl[$counterD] = $row['pnl'];
                $pnr[$counterD] = $row['pnr'];
                $rcln[$counterD] = $row['rcln'];
                $cbur[$counterD] = $row['sc'];
                $sdr[$counterD] = $row['sd'];
                $tdw[$counterD] = $row['td'];
                $fdw[$counterD] = $row['fd'];
                $cbuw[$counterD] = $row['scw'];
                $voucherNumberD[$counterD] = $row['reference_number'];
                $dateTransactionD[$counterD] = $row['date_transaction'];
                $idNumberD[$counterD] = $row['id_number'];

                if($cl[$counterD] == 1){
                    $expenses[$counter] = 0;
                    $cr_dr[$counter] = "";
                    $accountExpense[$counter] = "";

                    //BL
                    $sqlName = "SELECT * FROM  bl_credit_revenue_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultName = $conn->query($sqlName);
                    //$numRow = mysqli_num_rows($resultName);
                    

                    if($resultName->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultName)) {
                            # code...
                            //$releaseDate = $row['date_transaction'];
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $idNumber[$counter] = $row['id_number'];
                            $loanApplicationNumber[$counter] = $row['loan_application_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $serviceFee[$counter] = $row['service_fee'];
                            $fillingFee[$counter] = $row['filling_fee'];
                            $notarialFee[$counter] = $row['notarial_fee'];
                            $insuranceFee[$counter] = $row['insurance_fee'];
                            $interestRevenue[$counter] = $row['interest_revenue'];

                            $loanBalance[$counter] = $row['loanb_v'];
                            $loanRelease[$counter] = $row['amount_release'];
                            
                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = 0;
                            $cr_dr[$counter] = "";
                            $accountExpense[$counter] = "";


                            if($cbur[$counterD] == 1){
                                $sqlName = "SELECT * FROM  share_capital_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $scAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $scAmount[$counter] = 0;
                            }

                            if($sdr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  savings_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $sdAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $sdAmount[$counter] = 0;
                            }

                            if($pnl[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'pnti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $ricePenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $ricePenalty[$counter] = 0;
                            }

                            if($pnr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'plti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $loanPenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $loanPenalty[$counter] = 0;
                            }

                            if($rcln[$counterD] == 1){
                                $sqlName = "SELECT * FROM  disbursement_table WHERE reference_number = '$voucherNumber[$counter]' and id_number = '$idNumber[$counter]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){

                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $riceLoan[$counter] = $row['rcln_value'];
                                    }
                                }
                            }else{
                                $riceLoan[$counter] = 0;
                            }

                            $loanAmount[$counter] = $loanRelease[$counter] + $serviceFee[$counter] + $fillingFee[$counter] + $notarialFee[$counter] + $insuranceFee[$counter] + $interestRevenue[$counter] + $loanBalance[$counter] + $riceLoan[$counter] + $loanPenalty[$counter] + $ricePenalty[$counter] + $sdAmount[$counter] + $scAmount[$counter];
                        }
                    }else{
                        //$numRow--;
                    }

                    //RL
                    $sqlName = "SELECT * FROM  rl_credit_revenue_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultName = $conn->query($sqlName);
                    //$numRow = $numRow + mysqli_num_rows($resultName);
                    //$counter = 0;

                    if($resultName->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultName)) {
                            # code...
                            //$releaseDate = $row['date_transaction'];
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $idNumber[$counter] = $row['id_number'];
                            $loanApplicationNumber[$counter] = $row['loan_application_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $serviceFee[$counter] = $row['service_fee'];
                            $fillingFee[$counter] = $row['filling_fee'];
                            $notarialFee[$counter] = $row['notarial_fee'];
                            $insuranceFee[$counter] = $row['insurance_fee'];
                            $interestRevenue[$counter] = $row['interest_revenue'];
                            $loanBalance[$counter] = $row['loanb_v'];
                            $loanRelease[$counter] = $row['amount_release'];

                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = 0;
                            $cr_dr[$counter] = "";
                            $accountExpense[$counter] = "";


                            if($cbur[$counterD] == 1){
                                $sqlName = "SELECT * FROM  share_capital_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $scAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $scAmount[$counter] = 0;
                            }

                            if($sdr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  savings_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $sdAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $sdAmount[$counter] = 0;
                            }

                            if($pnl[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'pnti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $ricePenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $ricePenalty[$counter] = 0;
                            }

                            if($pnr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'plti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $loanPenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $loanPenalty[$counter] = 0;
                            }

                            if($rcln[$counterD] == 1){
                                $sqlName = "SELECT * FROM  disbursement_table WHERE reference_number = '$voucherNumber[$counter]' and id_number = '$idNumber[$counter]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){

                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $riceLoan[$counter] = $row['rcln_value'];
                                    }
                                }
                            }else{
                                $riceLoan[$counter] = 0;
                            }

                            $loanAmount[$counter] = $loanRelease[$counter] + $serviceFee[$counter] + $fillingFee[$counter] + $notarialFee[$counter] + $insuranceFee[$counter] + $interestRevenue[$counter] + $loanBalance[$counter] + $riceLoan[$counter] + $loanPenalty[$counter] + $ricePenalty[$counter] + $sdAmount[$counter] + $scAmount[$counter];
                        }
                    }else{
                        //$numRow--;
                    }

                    //CL
                    $sqlName = "SELECT * FROM  cl_credit_revenue_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultName = $conn->query($sqlName);
                    //$numRow = $numRow + mysqli_num_rows($resultName);
                    //$counter = 0;

                    if($resultName->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultName)) {
                            # code...
                            //$releaseDate = $row['date_transaction'];
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $idNumber[$counter] = $row['id_number'];
                            $loanApplicationNumber[$counter] = $row['loan_application_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $serviceFee[$counter] = $row['service_fee'];
                            $fillingFee[$counter] = $row['filling_fee'];
                            $notarialFee[$counter] = $row['notarial_fee'];
                            $insuranceFee[$counter] = $row['insurance_fee'];
                            $interestRevenue[$counter] = $row['interest_revenue'];
                            $loanBalance[$counter] = $row['loanb_v'];
                            $loanRelease[$counter] = $row['amount_release'];

                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = 0;
                            $cr_dr[$counter] = "";
                            $accountExpense[$counter] = "";


                            if($cbur[$counterD] == 1){
                                $sqlName = "SELECT * FROM  share_capital_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $scAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $scAmount[$counter] = 0;
                            }

                            if($sdr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  savings_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $sdAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $sdAmount[$counter] = 0;
                            }

                            if($pnl[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'pnti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $ricePenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $ricePenalty[$counter] = 0;
                            }

                            if($pnr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'plti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $loanPenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $loanPenalty[$counter] = 0;
                            }

                            if($rcln[$counterD] == 1){
                                $sqlName = "SELECT * FROM  disbursement_table WHERE reference_number = '$voucherNumber[$counter]' and id_number = '$idNumber[$counter]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){

                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $riceLoan[$counter] = $row['rcln_value'];
                                    }
                                }
                            }else{
                                $riceLoan[$counter] = 0;
                            }

                            $loanAmount[$counter] = $loanRelease[$counter] + $serviceFee[$counter] + $fillingFee[$counter] + $notarialFee[$counter] + $insuranceFee[$counter] + $interestRevenue[$counter] + $loanBalance[$counter] + $riceLoan[$counter] + $loanPenalty[$counter] + $ricePenalty[$counter] + $sdAmount[$counter] + $scAmount[$counter];
                        }
                    }else{
                        //$numRow--;
                    }

                    //EDL
                    $sqlName = "SELECT * FROM  edl_credit_revenue_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultName = $conn->query($sqlName);
                    //$numRow = $numRow + mysqli_num_rows($resultName);
                    //$counter = 0;

                    if($resultName->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultName)) {
                            # code...
                            //$releaseDate = $row['date_transaction'];
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $idNumber[$counter] = $row['id_number'];
                            $loanApplicationNumber[$counter] = $row['loan_application_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $serviceFee[$counter] = $row['service_fee'];
                            $fillingFee[$counter] = $row['filling_fee'];
                            $notarialFee[$counter] = $row['notarial_fee'];
                            $insuranceFee[$counter] = $row['insurance_fee'];
                            $interestRevenue[$counter] = $row['interest_revenue'];
                            $loanBalance[$counter] = $row['loanb_v'];
                            $loanRelease[$counter] = $row['amount_release'];

                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = 0;
                            $cr_dr[$counter] = "";
                            $accountExpense[$counter] = "";


                            if($cbur[$counterD] == 1){
                                $sqlName = "SELECT * FROM  share_capital_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $scAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $scAmount[$counter] = 0;
                            }

                            if($sdr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  savings_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $sdAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $sdAmount[$counter] = 0;
                            }

                            if($pnl[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'pnti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $ricePenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $ricePenalty[$counter] = 0;
                            }
                            
                            //comment

                            if($pnr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'plti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $loanPenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $loanPenalty[$counter] = 0;
                            }

                            if($rcln[$counterD] == 1){
                                $sqlName = "SELECT * FROM  disbursement_table WHERE reference_number = '$voucherNumber[$counter]' and id_number = '$idNumber[$counter]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){

                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $riceLoan[$counter] = $row['rcln_value'];
                                    }
                                }
                            }else{
                                $riceLoan[$counter] = 0;
                            }

                            $loanAmount[$counter] = $loanRelease[$counter] + $serviceFee[$counter] + $fillingFee[$counter] + $notarialFee[$counter] + $insuranceFee[$counter] + $interestRevenue[$counter] + $loanBalance[$counter] + $riceLoan[$counter] + $loanPenalty[$counter] + $ricePenalty[$counter] + $sdAmount[$counter] + $scAmount[$counter];
                        }
                    }else{
                        //$numRow--;
                    }

                    //CML
                    $sqlName = "SELECT * FROM  cml_credit_revenue_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultName = $conn->query($sqlName);
                    //$numRow = $numRow + mysqli_num_rows($resultName);
                    //$counter = 0;

                    if($resultName->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultName)) {
                            # code...
                            //$releaseDate = $row['date_transaction'];
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $idNumber[$counter] = $row['id_number'];
                            $loanApplicationNumber[$counter] = $row['loan_application_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $serviceFee[$counter] = $row['service_fee'];
                            $fillingFee[$counter] = $row['filling_fee'];
                            $notarialFee[$counter] = $row['notarial_fee'];
                            $insuranceFee[$counter] = $row['insurance_fee'];
                            $interestRevenue[$counter] = $row['interest_revenue'];
                            $loanBalance[$counter] = $row['loanb_v'];
                            $loanRelease[$counter] = $row['amount_release'];

                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = 0;
                            $cr_dr[$counter] = "";
                            $accountExpense[$counter] = "";


                            if($cbur[$counterD] == 1){
                                $sqlName = "SELECT * FROM  share_capital_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $scAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $scAmount[$counter] = 0;
                            }

                            if($sdr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  savings_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $sdAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $sdAmount[$counter] = 0;
                            }

                            if($pnl[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'pnti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $ricePenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $ricePenalty[$counter] = 0;
                            }

                            if($pnr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'plti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $loanPenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $loanPenalty[$counter] = 0;
                            }

                            if($rcln[$counterD] == 1){
                                $sqlName = "SELECT * FROM  disbursement_table WHERE reference_number = '$voucherNumber[$counter]' and id_number = '$idNumber[$counter]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){

                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $riceLoan[$counter] = $row['rcln_value'];
                                    }
                                }
                            }else{
                                $riceLoan[$counter] = 0;
                            }

                            $loanAmount[$counter] = $loanRelease[$counter] + $serviceFee[$counter] + $fillingFee[$counter] + $notarialFee[$counter] + $insuranceFee[$counter] + $interestRevenue[$counter] + $loanBalance[$counter] + $riceLoan[$counter] + $loanPenalty[$counter] + $ricePenalty[$counter] + $sdAmount[$counter] + $scAmount[$counter];
                        }
                    }else{
                        //$numRow--;
                    }

                    //EML
                    $sqlName = "SELECT * FROM  eml_credit_revenue_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultName = $conn->query($sqlName);
                    //$numRow = $numRow + mysqli_num_rows($resultName);
                    //$counter = 0;

                    if($resultName->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultName)) {
                            # code...
                            //$releaseDate = $row['date_transaction'];
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $idNumber[$counter] = $row['id_number'];
                            $loanApplicationNumber[$counter] = $row['loan_application_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $serviceFee[$counter] = $row['service_fee'];
                            $fillingFee[$counter] = $row['filling_fee'];
                            $notarialFee[$counter] = $row['notarial_fee'];
                            $insuranceFee[$counter] = $row['insurance_fee'];
                            $interestRevenue[$counter] = $row['interest_revenue'];
                            $loanBalance[$counter] = $row['loanb_v'];
                            $loanRelease[$counter] = $row['amount_release'];

                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = 0;
                            $cr_dr[$counter] = "";
                            $accountExpense[$counter] = "";


                            if($cbur[$counterD] == 1){
                                $sqlName = "SELECT * FROM  share_capital_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $scAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $scAmount[$counter] = 0;
                            }

                            if($sdr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  savings_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $sdAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $sdAmount[$counter] = 0;
                            }

                            if($pnl[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'pnti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $ricePenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $ricePenalty[$counter] = 0;
                            }

                            if($pnr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'plti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $loanPenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $loanPenalty[$counter] = 0;
                            }

                            if($rcln[$counterD] == 1){
                                $sqlName = "SELECT * FROM  disbursement_table WHERE reference_number = '$voucherNumber[$counter]' and id_number = '$idNumber[$counter]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){

                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $riceLoan[$counter] = $row['rcln_value'];
                                    }
                                }
                            }else{
                                $riceLoan[$counter] = 0;
                            }

                            $loanAmount[$counter] = $loanRelease[$counter] + $serviceFee[$counter] + $fillingFee[$counter] + $notarialFee[$counter] + $insuranceFee[$counter] + $interestRevenue[$counter] + $loanBalance[$counter] + $riceLoan[$counter] + $loanPenalty[$counter] + $ricePenalty[$counter] + $sdAmount[$counter] + $scAmount[$counter];
                        }
                    }else{
                        //$numRow--;
                    }

                    //SL
                    $sqlName = "SELECT * FROM  sl_credit_revenue_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultName = $conn->query($sqlName);
                    //$numRow = $numRow + mysqli_num_rows($resultName);
                    //$counter = 0;

                    if($resultName->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultName)) {
                            # code...
                            //$releaseDate = $row['date_transaction'];
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $idNumber[$counter] = $row['id_number'];
                            $loanApplicationNumber[$counter] = $row['loan_application_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $serviceFee[$counter] = $row['service_fee'];
                            $fillingFee[$counter] = $row['filling_fee'];
                            $notarialFee[$counter] = $row['notarial_fee'];
                            $insuranceFee[$counter] = $row['insurance_fee'];
                            $interestRevenue[$counter] = $row['interest_revenue'];
                            $loanBalance[$counter] = $row['loanb_v'];
                            $loanRelease[$counter] = $row['amount_release'];

                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = 0;

                            if($cbur[$counterD] == 1){
                                $sqlName = "SELECT * FROM  share_capital_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $scAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $scAmount[$counter] = 0;
                            }

                            if($sdr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  savings_table WHERE voucher_number = '$voucherNumber[$counter]' and id_number = '$idNumberD[$counterD]'";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $sdAmount[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $sdAmount[$counter] = 0;
                            }

                            if($pnl[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'pnti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $ricePenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $ricePenalty[$counter] = 0;
                            }

                            if($pnr[$counterD] == 1){
                                $sqlName = "SELECT * FROM  other_income_table WHERE reference_number = '$voucherNumber[$counter]' and income_code = 'plti' and id_number = '$idNumberD[$counterD]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){
                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $loanPenalty[$counter] = $row['amount'];
                                    }
                                }
                            }else{
                                $loanPenalty[$counter] = 0;
                            }

                            if($rcln[$counterD] == 1){
                                $sqlName = "SELECT * FROM  disbursement_table WHERE reference_number = '$voucherNumber[$counter]' and id_number = '$idNumber[$counter]' ";
                                $resultName = $conn->query($sqlName);

                                if($resultName->num_rows > 0){

                                    while ($row = mysqli_fetch_array($resultName)) {
                                        $riceLoan[$counter] = $row['rcln_value'];
                                    }
                                }
                            }else{
                                $riceLoan[$counter] = 0;
                            }

                            $loanAmount[$counter] = $loanRelease[$counter] + $serviceFee[$counter] + $fillingFee[$counter] + $notarialFee[$counter] + $insuranceFee[$counter] + $interestRevenue[$counter] + $loanBalance[$counter] + $riceLoan[$counter] + $loanPenalty[$counter] + $ricePenalty[$counter] + $sdAmount[$counter] + $scAmount[$counter];
                        }
                    }else{
                        //$numRow--;
                    }

                    $sqlSearchName = "SELECT * FROM name_table WHERE id_number = '$idNumber[$counter]' ";
                    $resultSearchName = $conn->query($sqlSearchName);

                    if($resultSearchName->num_rows > 0){
                        while($row = mysqli_fetch_array($resultSearchName)){
                          $firstName[$counter] = $row['first_name'];
                          $middleName[$counter] = $row['middle_name'];
                          $lastName[$counter] = $row['last_name'];

                          $fullNameD[$counter] = $lastName[$counter] . ", " . $middleName[$counter] . $firstName[$counter];
                        }
                    }

                    $totalServiceFee = $totalServiceFee + $serviceFee[$counter];
                    $totalFillinfFee = $totalFillinfFee + $fillingFee[$counter];
                    $totalNotarialFee = $totalNotarialFee + $notarialFee[$counter];
                    $totalInsuranceFee = $totalInsuranceFee + $insuranceFee[$counter];
                    $totalInterestRevenue = $totalInterestRevenue + $interestRevenue[$counter];
                    $totalscAmount = $totalscAmount  + $scAmount[$counter];
                    $totalsdAmount = $totalsdAmount  + $sdAmount[$counter];

                    $totalLoanBalance = $totalLoanBalance + $loanBalance[$counter];
                    $totalLoanPenalty = $totalLoanPenalty + $loanPenalty[$counter];

                    $totalRiceBalance = $totalRiceBalance + $riceLoan[$counter];
                    $totalRicePenalty = $totalRicePenalty + $ricePenalty[$counter];

                    $totalLoanAmount = $totalLoanAmount + $loanAmount[$counter];
                    $totalLoanRelease = $totalLoanRelease + $loanRelease[$counter];
                }else{
                    //$transactionnumber[$counter] = $row['transaction_number'];
                    //$idNumber[$counter] = "";
                    //$voucherNumber[$counter] = $row['voucher_number'];
                    $loanApplicationNumber[$counter] = "";
                    $serviceFee[$counter] = 0;
                    $fillingFee[$counter] = 0;
                    $notarialFee[$counter] = 0;
                    $insuranceFee[$counter] = 0;
                    $interestRevenue[$counter] = 0;
                    $loanBalance[$counter] = 0;
                    $sdAmount[$counter] = 0;
                    $scAmount[$counter] = 0;
                    $ricePenalty[$counter] = 0;
                    $loanPenalty[$counter] = 0;
                    $riceLoan[$counter] = 0;
                    $loanRelease[$counter] = 0;
                    $loanAmount[$counter] = 0;
                    //$dateTransaction[$counter] = $row['date_transaction'];
                    //$expenses[$counter] = 0;
                }

                //CA$exp[$counterD]";
                if($exp[$counterD] == 1){

                    $sqlNameE = "SELECT * FROM  chart_account_entry_table WHERE voucher_number ='$voucherNumberD[$counterD]' and expenses_category = '$idNumberD[$counterD]' ";
                    $resultNameE = $conn->query($sqlNameE);
                    //$numRow = mysqli_num_rows($resultName);
                    
                    if($resultNameE->num_rows > 0){
                        while($row = mysqli_fetch_array($resultNameE)){
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = $row['amount'];
                            $idNumber[$counter] = $row['expenses_category'];
                            $loanApplicationNumber[$counter] = $row['Remarks'];
                            $cr_dr[$counter] = $row['cr_dr'];
                            $accountExpense[$counter] = $row['account_expense'];

                            $sqlbi = "SELECT * FROM  chart_accounts WHERE account_code_lc = '$idNumber[$counter]' ";
                            $resultbi = $conn->query($sqlbi);

                            if($resultbi->num_rows > 0){
                                while ($row = mysqli_fetch_array($resultbi)) {
                                    # code...
                                    $fullNameD[$counter] = $row['account_title'];
                                    $numberCode = $row['account_code'];
                                }
                            }
                            
                            $idNumber[$counter] = $idNumber[$counter] . $numberCode; 
                            $totalExpenses = $totalExpenses + $expenses[$counter];
                        }
                    }

                    $serviceFee[$counter] = 0;
                    $fillingFee[$counter] = 0;
                    $notarialFee[$counter] = 0;
                    $insuranceFee[$counter] = 0;
                    $interestRevenue[$counter] = 0;
                    $loanBalance[$counter] = 0;
                    $sdAmount[$counter] = 0;
                    $scAmount[$counter] = 0;
                    $ricePenalty[$counter] = 0;
                    $loanPenalty[$counter] = 0;
                    $riceLoan[$counter] = 0;
                    $loanRelease[$counter] = 0;
                    $loanAmount[$counter] = 0;
                }else{
                    $expenses[$counter] = 0;
                    $cr_dr[$counter] = "";
                    $accountExpense[$counter] = "";
                }

                if($tdw[$counterD] == 1){
                    $sqlNameE = "SELECT * FROM  time_deposit_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultNameE = $conn->query($sqlNameE);
                    //$numRow = mysqli_num_rows($resultName);
                    
                    if($resultNameE->num_rows > 0){
                        while($row = mysqli_fetch_array($resultNameE)){
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = $row['amount'];

                            $idNumber[$counter] = $row['id_number'];
                            $loanApplicationNumber[$counter] = 'Time Deposit';
                        }
                    }

                    $totalExpenses = $totalExpenses + $expenses[$counter];

                    $sqlSearchName = "SELECT * FROM name_table WHERE id_number = '$idNumber[$counter]' ";
                    $resultSearchName = $conn->query($sqlSearchName);

                    if($resultSearchName->num_rows > 0){
                        while($row = mysqli_fetch_array($resultSearchName)){
                          $firstName[$counter] = $row['first_name'];
                          $middleName[$counter] = $row['middle_name'];
                          $lastName[$counter] = $row['last_name'];

                          $fullNameD[$counter] = $lastName[$counter] . ", " . $middleName[$counter] . $firstName[$counter];
                        }
                    }

                    $serviceFee[$counter] = 0;
                    $fillingFee[$counter] = 0;
                    $notarialFee[$counter] = 0;
                    $insuranceFee[$counter] = 0;
                    $interestRevenue[$counter] = 0;
                    $loanBalance[$counter] = 0;
                    $sdAmount[$counter] = 0;
                    $scAmount[$counter] = 0;
                    $ricePenalty[$counter] = 0;
                    $loanPenalty[$counter] = 0;
                    $riceLoan[$counter] = 0;
                    $loanRelease[$counter] = 0;
                    $loanAmount[$counter] = 0;
                    $cr_dr[$counter] = "";
                    $accountExpense[$counter] = "";
                }else{
                    $expenses[$counter] = 0;
                }

                if($fdw[$counterD] == 1){
                    $sqlNameE = "SELECT * FROM  fixed_deposit_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultNameE = $conn->query($sqlNameE);
                    //$numRow = mysqli_num_rows($resultName);
                    
                    if($resultNameE->num_rows > 0){
                        while($row = mysqli_fetch_array($resultNameE)){
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = $row['amount'];
                            $loanApplicationNumber[$counter] = 'Fixed Deposit';
                            $idNumber[$counter] = $row['id_number'];                     
                        }
                    }

                    $totalExpenses = $totalExpenses + $expenses[$counter];

                    $sqlSearchName = "SELECT * FROM name_table WHERE id_number = '$idNumber[$counter]' ";
                    $resultSearchName = $conn->query($sqlSearchName);

                    if($resultSearchName->num_rows > 0){
                        while($row = mysqli_fetch_array($resultSearchName)){
                          $firstName[$counter] = $row['first_name'];
                          $middleName[$counter] = $row['middle_name'];
                          $lastName[$counter] = $row['last_name'];

                          $fullNameD[$counter] = $lastName[$counter] . ", " . $middleName[$counter] . $firstName[$counter];
                        }
                    }

                    $serviceFee[$counter] = 0;
                    $fillingFee[$counter] = 0;
                    $notarialFee[$counter] = 0;
                    $insuranceFee[$counter] = 0;
                    $interestRevenue[$counter] = 0;
                    $loanBalance[$counter] = 0;
                    $sdAmount[$counter] = 0;
                    $scAmount[$counter] = 0;
                    $ricePenalty[$counter] = 0;
                    $loanPenalty[$counter] = 0;
                    $riceLoan[$counter] = 0;
                    $loanRelease[$counter] = 0;
                    $loanAmount[$counter] = 0;
                    $cr_dr[$counter] = "";
                    $accountExpense[$counter] = "";
                }else{
                    $expenses[$counter] = 0;
                }

                
                if($cbuw[$counterD] == 1){
                    $sqlNameE = "SELECT * FROM  share_capital_table WHERE voucher_number ='$voucherNumberD[$counterD]' and id_number = '$idNumberD[$counterD]' ";
                    $resultNameE = $conn->query($sqlNameE);
                    //$numRow = mysqli_num_rows($resultName);
                    
                    if($resultNameE->num_rows > 0){
                        while($row = mysqli_fetch_array($resultNameE)){
                            $transactionnumber[$counter] = $row['transaction_number'];
                            $voucherNumber[$counter] = $row['voucher_number'];
                            $dateTransaction[$counter] = $row['date_transaction'];
                            $expenses[$counter] = $row['amount'];

                            $idNumber[$counter] = $row['id_number'];
                            $loanApplicationNumber[$counter] = 'Share Capital';
                            //$fullNameD[$counter] = $row['Remarks'];
                            
                        }
                    }

                    $totalExpenses = $totalExpenses + $expenses[$counter];

                    $sqlSearchName = "SELECT * FROM name_table WHERE id_number = '$idNumber[$counter]' ";
                    $resultSearchName = $conn->query($sqlSearchName);

                    if($resultSearchName->num_rows > 0){
                        while($row = mysqli_fetch_array($resultSearchName)){
                          $firstName[$counter] = $row['first_name'];
                          $middleName[$counter] = $row['middle_name'];
                          $lastName[$counter] = $row['last_name'];

                          $fullNameD[$counter] = $lastName[$counter] . ", " . $middleName[$counter] . $firstName[$counter];
                        }
                    }

                    $serviceFee[$counter] = 0;
                    $fillingFee[$counter] = 0;
                    $notarialFee[$counter] = 0;
                    $insuranceFee[$counter] = 0;
                    $interestRevenue[$counter] = 0;
                    $loanBalance[$counter] = 0;
                    $sdAmount[$counter] = 0;
                    $scAmount[$counter] = 0;
                    $ricePenalty[$counter] = 0;
                    $loanPenalty[$counter] = 0;
                    $riceLoan[$counter] = 0;
                    $loanRelease[$counter] = 0;
                    $loanAmount[$counter] = 0;
                    $cr_dr[$counter] = "";
                    $accountExpense[$counter] = "";
                }else{
                    $expenses[$counter] = 0;
                }

                $counter++;
                $counterD++;
            }
        }

        //PRINT
        if($printReport == "printReport"){

            $pdf = new FPDF();

            $rowCounter = 0;

            $pdf->SetFont('Arial','B',8);
            $pdf->AddPage('L','Legal', 0);

            //Title
            $pdf->Cell(100,7,"Maligaya Wet Market Multi-Purpose Cooperative");$pdf->Ln();
            $pdf->Cell(100,7,"Credit Cash Receivables");$pdf->Ln();
            $pdf->Cell(30,7,"From");
            $pdf->Cell(30,7,"$startDate");$pdf->Ln();
            $pdf->Cell(30,7,"To");
            $pdf->Cell(30,7,"$endDate");$pdf->Ln();
            //Header
            $pdf->Cell(22,7,"SERVICE ID #",1);
            $pdf->Cell(22,7,"ID #",1);
            $pdf->Cell(65,7,"NAME",1);
            $pdf->Cell(22,7,"VOUCHER #",1);
            $pdf->Cell(22,7,"OR #",1);
            $pdf->Cell(22,7,"SERVICE FEE #",1);
            $pdf->Cell(22,7,"FILLINF FEE",1);
            $pdf->Cell(22,7,"NOTARIAL FEE",1);
            $pdf->Cell(22,7,"INSURANCE FEE",1);
            $pdf->Cell(22,7,"PRINCIPAL FEE",1);
            $pdf->Cell(22,7,"INTEREST FEE",1);
            $pdf->Cell(22,7,"SHARE CAPITAL",1);
            $pdf->Cell(22,7,"DATE",1);
            $pdf->Ln();

            $fullName[] = "";
            $totalSale = 0;

            while($rowCounter < $numRow) {
                $pdf->Cell(22,7,"$loanApplicationNumber[$rowCounter]",1);
                $pdf->Cell(22,7,"$idNumber[$rowCounter]",1);
                $fullName[$rowCounter] = $lastName[$rowCounter] . ", " . $firstName[$rowCounter] . " " . $middleName[$rowCounter];
                $pdf->Cell(65,7,"$fullName[$rowCounter]",1);
                $pdf->Cell(22,7,"$voucherNumber[$rowCounter]",1);
                $pdf->Cell(22,7,"$orNumber[$rowCounter]",1);
                $pdf->Cell(22,7,"$serviceFee[$rowCounter]",1);
                $pdf->Cell(22,7,"$fillingFee[$rowCounter]",1);
                $pdf->Cell(22,7,"$notarialFee[$rowCounter]",1);
                $pdf->Cell(22,7,"$insuranceFee[$rowCounter]",1);
                $pdf->Cell(22,7,"$PrincipalFee[$rowCounter]",1);
                $pdf->Cell(22,7,"$interestRevenue[$rowCounter]",1);
                $pdf->Cell(22,7,"$scAmount[$rowCounter]",1);
                $pdf->Cell(22,7,"$dateTransaction[$rowCounter]",1);
                $pdf->Ln();
                
                $rowCounter ++;
            }

            //Total 
            $pdf->AddPage('L','A4', 0);
            $pdf->Cell(100,7,"Loan Cash Receivables Summary");$pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(100,7,"Loan Summary");$pdf->Ln();

            $pdf->Cell(30,7,"",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"PRINCIPAL",1);
            $pdf->Cell(30,7,"INTEREST",1);
            $pdf->Ln();

            $pdf->Cell(30,7,"TOTAL",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"$",1);
            $pdf->Cell(45,7,"$totalPrincipal",1);
            $pdf->Cell(30,7,"$totalInterestRevenue",1);

            $pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(100,7,"Service Fee");$pdf->Ln();

            $pdf->Cell(30,7,"",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(30,7,"",1);
            $pdf->Ln();

            $pdf->Cell(30,7,"TOTAL",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"$",1);
            $pdf->Cell(45,7,"$",1);
            $pdf->Cell(30,7,"$totalServiceFee",1);

            $pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(100,7,"Filling Fee");$pdf->Ln();

            $pdf->Cell(30,7,"",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(30,7,"",1);
            $pdf->Ln();

            $pdf->Cell(30,7,"TOTAL",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(30,7,"$totalFillinfFee",1);

            $pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(100,7,"Notarial Fee");$pdf->Ln();

            $pdf->Cell(30,7,"",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(30,7,"",1);
            $pdf->Ln();

            $pdf->Cell(30,7,"TOTAL",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(30,7,"$totalNotarialFee",1);

            $pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(100,7,"Insurance Fee");$pdf->Ln();

            $pdf->Cell(30,7,"",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(30,7,"",1);
            $pdf->Ln();

            $pdf->Cell(30,7,"TOTAL",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(30,7,"$totalInsuranceFee",1);

            $pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(100,7,"Total Share Capital");$pdf->Ln();

            $pdf->Cell(30,7,"",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(30,7,"",1);
            $pdf->Ln();

            $pdf->Cell(30,7,"TOTAL",1);
            $pdf->Cell(60,7,"",1);
            $pdf->Cell(25,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(45,7,"",1);
            $pdf->Cell(30,7,"$totalscAmount",1);

            $pdf->Output();
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Loan Service</title>
    <?php include "css.html" ?>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div>
        <?php //include 'topbar.php';?>
        <div class="row">
            <?php include 'navigation.php';?>
            <div  style="margin-top:70px;margin-left: 16.7%;">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-10">
                            <input type="date" class="form-control" value = "<?php echo $startDate;?>" name = "startDate">
                        </div>
                        <label class="col-md-6 control-label">Start Date</label>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10">
                            <input type="date" class="form-control" value = "<?php echo $endDate;?>" name = "endDate">
                        </div>
                        <label class="col-md-6 control-label">End Date</label>
                    </div>

                    <div class="form-group">
                        <div class="col-md-10 form">
                            <button class="btn btn-outline-success my-2 my-sm-0" name = "searchReport" value = "searchReport" type="submit" style="align-self: center;">SEARCH</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 form">
                            <button class="btn btn-outline-success my-2 my-sm-0" name = "printReport" value = "printReport" type="submit" style="align-self: center;">PRINT</button>
                        </div>
                    </div>
                </div>
                <p>Disbursement</p>
                <div class="table table-striped table-hover table-bordered table-dark">
                    <?php
                    echo "<table>
                    <tr>
                        <th></th>
                        <th></th>
                        
                        <th>ID Number | Chart_of_Account_Code</th>
                        <th>Name | Chart_of_Account_Title_______________</th>
                        <th>Description | Remarks</th>
                        <th>Voucher #</th>
                        <th>Expenses</th>
                        <th>Credit | Debit</th>
                        <th>Trading | Lending</th>
                        <th>Loan Amount</th>
                        <th>Loan Release</th>
                        <th>Service Fee</th>
                        <th>Filing Fee</th>
                        <th>Notarial Fee</th>
                        <th>Insurarance Fee</th>
                        <th>Interest</th>
                        <th>SC Retention</th>
                        <th>SD Retention</th>
                        <th>Loan Balance</th>
                        <th>Loan Penalty</th>
                        <th>Rice Balance</th>
                        <th>Rice Penalty</th>
                        <th>Date Transaction</th>
                    </tr>";

                    $counterh = 0;
                    while($counterh < $numRow) {
                        echo "<tr>";
                            echo "<td>  <button class =". "deletebutton". " "  . "type =" . "submit" . " " . " " ."value=". "$voucherNumber[$counterh]" . " " . "name=" . "clearOR". ">"  . "CLEAR" . " </button> </td>";
                            echo "<td> <button class =". "deletebutton". " " . "type =" . "submit" . " " . " " ."value=". "$voucherNumber[$counterh]" . " " . "name=" . "cancelOR" . ">"  . "CANCEL" . " </button> </td>";

                            //echo "<td>" . $transactionnumber[$counterh] . "</td>";
                            echo "<td>" . $idNumber[$counterh] . "</td>";
                            echo "<td>" . $fullNameD[$counterh] . "</td>";
                            echo "<td>" . $loanApplicationNumber[$counterh] . "</td>";
                            echo "<td>" . $voucherNumber[$counterh] . "</td>";

                            if($expenses[$counterh] == 0){
                                $expenses[$counterh] = "";
                            }
                            echo "<td>" . $expenses[$counterh] . "</td>";

                            if($cr_dr[$counterh] == "cr"){
                                $cr_dr[$counterh] = "Credit";
                            }elseif($cr_dr[$counterh] == "dr"){
                                $cr_dr[$counterh] = "Debit";
                            }

                            echo "<td>" . $cr_dr[$counterh] . "</td>";

                            if($accountExpense[$counterh] == "td"){
                                $accountExpense[$counterh] = "Trading";
                            }elseif($accountExpense[$counterh] == "ld"){
                                $accountExpense[$counterh] = "Lending";
                            }

                            echo "<td>" . $accountExpense[$counterh] . "</td>";

                            if($loanAmount[$counterh] == 0){
                                $loanAmount[$counterh] = "";
                            }
                            echo "<td>" . $loanAmount[$counterh] . "</td>";

                            if($loanRelease[$counterh] == 0){
                                $loanRelease[$counterh] = "";
                            }
                            echo "<td>" . $loanRelease[$counterh] . "</td>";

                            if($serviceFee[$counterh] == 0){
                                $serviceFee[$counterh] = "";
                            }
                            echo "<td>" . $serviceFee[$counterh] . "</td>";

                            if($fillingFee[$counterh] == 0){
                                $fillingFee[$counterh] = "";
                            }
                            echo "<td>" . $fillingFee[$counterh] . "</td>";

                            if($notarialFee[$counterh] == 0){
                                $notarialFee[$counterh] = "";
                            }
                            echo "<td>" . $notarialFee[$counterh] . "</td>";

                            if($insuranceFee[$counterh] == 0){
                                $insuranceFee[$counterh] = "";
                            }
                            echo "<td>" . $insuranceFee[$counterh] . "</td>";

                            if($interestRevenue[$counterh] == 0){
                                $interestRevenue[$counterh] = "";
                            }
                            echo "<td>" . $interestRevenue[$counterh] . "</td>";

                            if($scAmount[$counterh] == 0){
                                $scAmount[$counterh] = "";
                            }
                            echo "<td>" . $scAmount[$counterh] . "</td>";

                            if($sdAmount[$counterh] == 0){
                                $sdAmount[$counterh] = "";
                            }
                            echo "<td>" . $sdAmount[$counterh] . "</td>";

                            if($loanBalance[$counterh] == 0){
                                $loanBalance[$counterh] = "";
                            }
                            echo "<td>" . $loanBalance[$counterh] . "</td>";

                            if($loanPenalty[$counterh] == 0){
                                $loanPenalty[$counterh] = "";
                            }
                            echo "<td>" . $loanPenalty[$counterh] . "</td>";

                            if($riceLoan[$counterh] == 0){
                                $riceLoan[$counterh] = "";
                            }
                            echo "<td>" . $riceLoan[$counterh] . "</td>";

                            if($ricePenalty[$counterh] == 0){
                                $ricePenalty[$counterh] = "";
                            }
                            echo "<td>" . $ricePenalty[$counterh] . "</td>";

                            echo "<td>" . $dateTransaction[$counterh] . "</td>";
                        echo "</tr>";
                        $counterh++;
                    }

                    echo "<tr>";
                            echo "<td>" . "" . "</td>";
                            echo "<td>" . "" . "</td>";
                            echo "<td>" . "" . "</td>";
                            echo "<td>" . "" . "</td>";
                            echo "<td>" . "" . "</td>";
                            echo "<td>" . "" . "</td>";
                            echo "<td>" . number_format($totalExpenses,'2','.',',') . "</td>";
                            echo "<td>" . "" . "</td>";
                            echo "<td>" . "" . "</td>";
                            echo "<td>" . number_format($totalLoanAmount,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalLoanRelease,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalServiceFee,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalFillinfFee,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalNotarialFee,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalInsuranceFee,'2','.',',') . "</td>";    
                            echo "<td>" . number_format($totalInterestRevenue,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalscAmount,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalsdAmount,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalLoanBalance,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalLoanPenalty,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalRiceBalance,'2','.',',') . "</td>";
                            echo "<td>" . number_format($totalRicePenalty,'2','.',',') . "</td>";
                            echo "<td>" . "" . "</td>";
                        echo "</tr>";
                    ?>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
<?php include "css1.html" ?>
</html>