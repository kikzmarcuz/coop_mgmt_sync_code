<?php  

require_once 'session.php';

$idNumber [] = "";
$accountNumber [] = "";

$transactionNumber  [] = "";
$orNumber [] = "";
$totalAmount [] = "";
$dateTransaction [] = "";
$encoder  [] = "";
$numRow = "";

$dateToday = date('Y-m-d');
$printReport = "";
$editOR = "";

//cahier
$bl[] = 0;
$cll[] = 0;
$cml[] = 0;
$edl[] = 0;
$rl[] = 0;
$pl[] = 0;
$cl[] = 0;
$ckl[] = 0;
$eml[] = 0;
$sl[] = 0;
$rcl[] = 0;
$rcc[] = 0;
$oi[] = 0;
$sc[] = 0;
$sd[] = 0;
$td[] = 0;
$fd[] = 0;

$blValue[] = 0;
$bliValue[] = 0;
$cllValue[] = 0;
$clliValue[] = 0;
$cmlValue[] = 0;
$cmliValue[] = 0;
$edlValue[] = 0;
$edliValue[] = 0;
$rlValue[] = 0;
$rliValue[] = 0;
$plValue[] = 0;
$pliValue[] = 0;
$clValue[] = 0;
$cklValue[] = 0;
$emlValue[] = 0;
$slValue[] = 0;
$rclValue[] = 0;
$rcliValue[] = 0;
$rccValue[] = 0;
$rcciValue[] = 0;
$oiValue[] = 0;
$scValue[] = 0;
$sdValue[] = 0;
$tdValue[] = 0;
$fdValue[] = 0;

$exitB = "";
$countErr = 0;

$totalAmountS = 0;
$totalAmountBL = 0;
$totalAmountCLL = 0;
$totalamountCML = 0;
$totalAmountEDL = 0;
$totalAmountRL = 0;
$totalAmountPL = 0;
$totalAmountCL = 0;
$totalAmountCKL = 0;
$totalAmountEML = 0;
$totalAmountSL = 0;
$totalAmountRCL = 0;
$totalAmountRCC = 0;
$totalAmountOI = 0;
$totalAmountSC = 0;
$totalAmountSD = 0;
$totalAmountTD = 0;
$totalAmountFD = 0;

$totalLending[] = 0;
$totalTrading[] = 0;
$totalInterest[] = 0;

$totalLendingF = 0;
$totalTradingF = 0;
$totalInterestF = 0;

$totalPenaltyRice = 0;
$totalPenaltyLoan = 0;
$totalRentalIncome = 0;

$totalRCLI = 0;
$totalRCCI = 0;

require('../../../public/fpdf181/fpdf.php');

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

    if (!empty($_POST["editOR"])) {
        $editOR = test_input($_POST["editOR"]);
    }

    if (empty($_POST["dateToday"])) {
        $countErr++;
    }else {
        $dateToday = test_input($_POST["dateToday"]);
    }

    if($exitB = $exitB){
        session_destroy();
        header("Location: http://localhost/projectkikz/samplemwmmpc/application/views/home/login.php");
        require_once 'logout.php';
    }

    if($editOR = $editOR){
        //header("Location: http://localhost/projectkikz/samplemwmmpc/application/views/home/updateOR.php");
        header("Location: http://system.local/application/views/home/updateOR.php");
        //require_once 'logout.php';
    }

    if($searchReport == "searchReport" OR $printReport == "printReport"){

        $sqlName = "SELECT * FROM  cashier_report_table WHERE date_transaction = '$dateToday' order by or_number asc";

        $resultName = $conn->query($sqlName);
        $numRow = mysqli_num_rows($resultName);
        $counter = 0;

        if($resultName->num_rows > 0){
            while ($row = mysqli_fetch_array($resultName)) {
                # code...
                $transactionNumber[$counter] = $row['transaction_number'];
                $idNumber[$counter] = $row['id_number'];
                $orNumber[$counter] = $row['or_number'];
                $totalAmount[$counter] = $row['total_amount'];
                $bl[$counter] = $row['bl'];
                $cll[$counter] = $row['cll'];
                $cml[$counter] = $row['cml'];
                $edl[$counter] = $row['edl'];
                $rl[$counter] = $row['rl'];
                $pl[$counter] = $row['pl'];
                $cl[$counter] = $row['cl'];
                $ckl[$counter] = $row['ckl'];
                $eml[$counter] = $row['eml'];
                $sl[$counter] = $row['sl'];
                $rcl[$counter] = $row['rcl'];
                $rcc[$counter] = $row['rcc'];
                $oi[$counter] = $row['oi'];
                $sc[$counter] = $row['sc'];
                $sd[$counter] = $row['sd'];
                $td[$counter] = $row['td'];
                $fd[$counter] = $row['fd'];
                $dateTransaction[$counter] = $row['date_transaction'];
                $encodedBy[$counter] = $row['encoded_by'];

                if($bl[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  bl_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    $sqlLP2 = "SELECT * FROM  bl_credit_revenue_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP2 = $conn->query($sqlLP2);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $blValue[$counter] = $row['amount'];
                        }
                    }

                    //Interest
                    if($resultLP2->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP2)) {
                            # code...
                            $bliValue[$counter] = $row['interest_revenue'];
                        }
                    }
                }else{
                    $blValue[$counter] = 0;
                    $bliValue[$counter] = 0;
                }

                if($cll[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  cll_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    $sqlLP2 = "SELECT * FROM  cll_credit_revenue_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP2 = $conn->query($sqlLP2);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $cllValue[$counter] = $row['amount'];
                        }
                    }

                    //Interest
                    if($resultLP2->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP2)) {
                            # code...
                            $clliValue[$counter] = $row['interest_revenue'];
                        }
                    }
                }else{
                    $cllValue[$counter] = 0;
                    $clliValue[$counter] = 0;
                }

                if($cml[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  cml_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    $sqlLP2 = "SELECT * FROM  cml_credit_revenue_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP2 = $conn->query($sqlLP2);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $cmlValue[$counter] = $row['amount'];
                        }
                    }

                    //Interest
                    if($resultLP2->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP2)) {
                            # code...
                            $cmliValue[$counter] = $row['interest_revenue'];
                        }
                    }
                }else{
                    $cmlValue[$counter] = 0;
                    $cmliValue[$counter] = 0;
                }

                if($edl[$counter] == 1){
                   $sqlLP1 = "SELECT * FROM  edl_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    $sqlLP2 = "SELECT * FROM  edl_credit_revenue_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP2 = $conn->query($sqlLP2);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $edlValue[$counter] = $row['amount'];
                        }
                    }

                    //Interest
                    if($resultLP2->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP2)) {
                            # code...
                            $edliValue[$counter] = $row['interest_revenue'];
                        }
                    }
                }else{
                    $edlValue[$counter] = 0;
                    $edliValue[$counter] = 0;
                }

                if($rl[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  rl_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    $sqlLP2 = "SELECT * FROM  rl_credit_revenue_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP2 = $conn->query($sqlLP2);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $rlValue[$counter] = $row['amount'];
                        }
                    }

                    //Interest
                    if($resultLP2->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP2)) {
                            # code...
                            $rliValue[$counter] = $row['interest_revenue'];
                        }
                    }
                }else{
                    $rlValue[$counter] = 0;
                    $rliValue[$counter] = 0;
                }

                if($pl[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  pl_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    $sqlLP2 = "SELECT * FROM  pl_credit_revenue_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP2 = $conn->query($sqlLP2);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        $plValueTemp = 0;
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $plValueTemp = $plValueTemp + $row['amount'];
                            $plValue[$counter] = $plValueTemp;
                        }
                    }

                    //Interest
                    if($resultLP2->num_rows > 0){
                        $pliValueTemp = 0;
                        while ($row = mysqli_fetch_array($resultLP2)) {
                            # code...
                            $pliValueTemp = $pliValueTemp + $row['interest_revenue'];
                            $pliValue[$counter] = $pliValueTemp;
                        }
                    }
                }else{
                    $plValue[$counter] = 0;
                    $pliValue[$counter] = 0;
                }

                if($cl[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  cl_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $clValue[$counter] = $row['amount'];
                        }
                    }
                }else{
                    $clValue[$counter] = 0;
                }

                if($ckl[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  ckl_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $cklValue[$counter] = $row['amount'];
                        }
                    }
                }else{
                    $cklValue[$counter] = 0;
                }

                if($eml[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  eml_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $emlValue[$counter] = $row['amount'];
                        }
                    }
                }else{
                    $emlValue[$counter] = 0;
                }

                if($sl[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  sl_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $slValue[$counter] = $row['amount'];
                        }
                    }
                }else{
                    $slValue[$counter] = 0 ;
                }

                if($rcl[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  rice_loan_payment_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    $sqlLP2 = "SELECT * FROM  rice_credit_revenue_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP2 = $conn->query($sqlLP2);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $rclValue[$counter] = $row['amount'];
                        }
                    }

                    //Interest
                    if($resultLP2->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP2)) {
                            # code...
                            $rcliValue[$counter] = $row['interest_revenue'];
                        }
                    }
                }else{
                    $rclValue[$counter] = 0;
                    $rcliValue[$counter] = 0;
                }

                if($rcc[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  rice_cash_revenue_table WHERE or_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $rccValue[$counter] = $row['principal_amount'];
                            $rcciValue[$counter] = $row['interest_amount'];
                        }
                    }
                }else{
                    $rccValue[$counter] = 0;
                    $rcciValue[$counter] = 0;
                }

                if($oi[$counter] == 1){
                    $oiValueTemp = 0;
                    $penaltyLoan[] = 0;
                    $penaltyRice[] = 0;
                    $RentalIncome[] = 0;
                    $oiStat = 0;
                    $plStat = 0;
                    $prStat = 0;
                    $riStat = 0;

                    $sqlLP1 = "SELECT * FROM  other_income_table WHERE or_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            if ($row['income_code'] != "pnti" and $row['income_code'] != "plti" and $row['income_code'] != "rnti"){
                                $oiValueTemp = $oiValueTemp + $row['amount'];
                                $oiValue[$counter] = $oiValueTemp;
                                $oiStat = 1;
                            }elseif ($row['income_code'] == "pnti"){
                                //echo "string";
                                $penaltyRice[$counter] = $row['amount'];
                                $prStat = 1;
                            }elseif ($row['income_code'] == "plti") {
                                $penaltyLoan[$counter] = $row['amount'];
                                $plStat = 1;
                            }elseif ($row['income_code'] == "rnti") {
                                $RentalIncome[$counter] = $row['amount'];
                                $riStat = 1;
                            }
                        }
                    }

                    if($oiStat == 0){
                        $oiValue[$counter] = 0;
                    }

                    if($plStat == 0){
                        $penaltyLoan[$counter] = 0;
                    }

                    if($prStat == 0){
                        $penaltyRice[$counter] = 0;
                    }

                    if($riStat == 0){
                        $RentalIncome[$counter] = 0;
                    }

                }else{
                    $oiValue[$counter] = 0;
                    $penaltyLoan[$counter] = 0;
                    $penaltyRice[$counter] = 0;
                    $RentalIncome[$counter] = 0;
                }

                if($sc[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  share_capital_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $scValue[$counter] = $row['amount'];
                        }
                    }
                }else{
                     $scValue[$counter] = 0;
                }

                if($sd[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  savings_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $sdValue[$counter] = $row['amount'];
                        }
                    }
                }else{
                    $sdValue[$counter] = 0;
                }

                if($td[$counter] == 1){
                    $sqlLP1 = "SELECT * FROM  time_deposit_table WHERE reference_number = '$orNumber[$counter]' ";
                    $resultLP1 = $conn->query($sqlLP1);

                    //Principal
                    if($resultLP1->num_rows > 0){
                        while ($row = mysqli_fetch_array($resultLP1)) {
                            # code...
                            $tdValue[$counter] = $row['amount'];
                        }
                    }
                }else{
                    $tdValue[$counter] = 0;
                }

                if($fd[$counter] == 1){

                }else{
                    $fdValue[$counter] = 0;   
                }

                $sqlLS = "SELECT * FROM  name_table WHERE id_number = '$idNumber[$counter]' order by last_name asc ";
                    $resultLS = $conn->query($sqlLS);
                    //$numRow = mysqli_num_rows($resultName);

                if($resultLS->num_rows > 0){
                    while ($row = mysqli_fetch_array($resultLS)) {
                        # code...
                        //$idNumberS[$counter] = $row['id_number'];
                        $firstName[$counter] = $row['first_name'];
                        $middleName[$counter] = $row['middle_name'];
                        $lastName[$counter] = $row['last_name'];
                    }
                }

                $counter++;
            }
        }

        if($printReport == "printReport"){

            $pdf = new FPDF();

            $rowCounter = 0;

            $pdf->SetFont('Arial','B',9);
            $pdf->AddPage('L','Legal', 0);
            
            //foreach($header as $col)

            $pdf->Cell(30,7,"ID #",1);
            $pdf->Cell(65,7,"Name",1);
            $pdf->Cell(70,7,"Birth Place",1);
            $pdf->Cell(30,7,"Birth Date",1);
            $pdf->Cell(30,7,"TIN #",1);
            $pdf->Cell(30,7,"SSS #",1);
            $pdf->Cell(30,7,"Mobile #",1);
            $pdf->Cell(30,7,"Status",1);
            $pdf->Ln();

            $fullName[] = "";
            while($rowCounter < $numRow) {
                    $pdf->Cell(30,7,"$idNumber[$rowCounter]",1);
                    $fullName[$rowCounter] = $lastName[$rowCounter] . ", " . $firstName[$rowCounter] . " " . $middleName[$rowCounter];
                    $pdf->Cell(65,7,"$fullName[$rowCounter]",1);
                    $pdf->Cell(70,7,"$birthPlace[$rowCounter]",1);
                    $pdf->Cell(30,7,"$birthDate[$rowCounter]",1);
                    $pdf->Cell(30,7,"$tinNumber[$rowCounter]",1);
                    $pdf->Cell(30,7,"$sssNumber[$rowCounter]",1);
                    $pdf->Cell(30,7,"$mobileNumber[$rowCounter]",1);
                    $pdf->Cell(30,7,"$membershipStatus[$rowCounter]",1);
                    $pdf->Ln();
                $rowCounter ++;
            }

            $pdf->Output();
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
<!DOCTYPE html>
<html>
<head>
	<title>Daily Report</title>
    <?php include "css.html" ?>
</head>
<body>
<div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php //include 'topbar.php';?>
        <div class="row">
            <?php include 'navigation.php';?>
            <div class="col-sm-9" style="margin-top:70px;margin-left: 16.7%;">
                <div class="row">
                    <div class="form-group">
                        
                        <div class="col-md-10">
                            <div class="col-md-10">
                                <input type="date" class="form-control" value = "<?php echo $dateToday;?>" name = "dateToday">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 form">
                            <button class="btn btn-outline-success my-2 my-sm-0" name = "searchReport" value = "searchReport" type="submit" style="align-self: center;">SEARCH</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 form">
                            <button class="btn btn-outline-success my-2 my-sm-0" name = "editOR" value = "editOR" type="submit" style="align-self: center;">EDIT OR</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 form">
                            <button class="btn btn-outline-success my-2 my-sm-0" name = "printReport" value = "printReport" type="submit" style="align-self: center;">PRINT</button>
                        </div>
                    </div>
                </div>
                <p>Daily Cash Register</p>
                <br>
                <div class="table table-striped table-hover">
                <?php
                echo "<table>
                <tr>
                    <th>Transaction #</th>
                    <th>ID #</th>
                    <th>MEMBER NAME</th>
                    <th>OR #</th>
                    <th>Grand Total</th>
                    <th>Trading Total</th>
                    <th>Lending Total</th>
                    <th>Interest</th>
                    <th>BL</th>
                    <th>CLL</th>
                    <th>CML</th>
                    <th>EDL</th>
                    <th>RL</th>
                    <th>PL</th>
                    <th>CL</th>
                    <th>CKL</th>
                    <th>EML</th>
                    <th>SL</th>
                    <th>Penalty</th>
                    <th>RENTAL RECIEVABLES</th>
                    <th>OI</th>
                    <th>CBU</th>
                    <th>FD</th>
                    <th>RLR</th>
                    <th>IR</th>
                    <th>AR</th>
                    <th>IR</th>
                    <th>Penalty</th>
                    <th>SD</th>
                    <th>TD</th>
                    <th>Date</th>
                    <th>Encoder</th>
                </tr>";
                
                $counterh = 0;
                while($counterh < $numRow) {
                        echo "<tr>";
                            echo "<td>" . $transactionNumber[$counterh] . "</td>";
                            echo "<td>" . $idNumber[$counterh] . "</td>";
                            echo "<td>" . $lastName[$counterh] . ", " . $firstName[$counterh] . " " . $middleName[$counterh] . "</td>";
                            echo "<td>" . $orNumber[$counterh] . "</td>";

                            //GRAND TOTAL
                            $totalAmountS = $totalAmountS + $totalAmount[$counterh];
                            echo "<td>" . number_format($totalAmount[$counterh],'2','.',',') . "</td>";

                            //TRADING
                            $totalTrading[$counterh] = $rclValue[$counterh] + $rccValue[$counterh] + $sdValue[$counterh] + $tdValue[$counterh] + $rcliValue[$counterh] + $rcciValue[$counterh] + $penaltyRice[$counterh];
                            $totalTradingF = $totalTradingF + $totalTrading[$counterh];
                            echo "<td>" . number_format($totalTrading[$counterh],'2','.',',') . "</td>";

                            //LENDING
                            $totalLending[$counterh] = $blValue[$counterh] + $cllValue[$counterh] + $cmlValue[$counterh] + $edlValue[$counterh] + $rlValue[$counterh] + $plValue[$counterh] + $clValue[$counterh] + $cklValue[$counterh] + $emlValue[$counterh] + $slValue[$counterh] + $scValue[$counterh] + $oiValue[$counterh] + $fdValue[$counterh] + $bliValue[$counterh] + $clliValue[$counterh] + $cmliValue[$counterh] + $edliValue[$counterh] + $rliValue[$counterh] + $pliValue[$counterh] + $penaltyLoan[$counterh] + $RentalIncome[$counterh];
                            $totalLendingF = $totalLendingF + $totalLending[$counterh];
                            echo "<td>" . number_format($totalLending[$counterh],'2','.',',') . "</td>";

                            //TRADING INTEREST
                            $totalInterest[$counterh] = $bliValue[$counterh] + $clliValue[$counterh] + $cmliValue[$counterh] + $edliValue[$counterh] + $rliValue[$counterh] + $pliValue[$counterh];
                            $totalInterestF = $totalInterestF +  $totalInterest[$counterh];
                            echo "<td>" . number_format($totalInterest[$counterh],'2','.',',') . "</td>";

                            $totalAmountBL = $totalAmountBL + $blValue[$counterh];
                            echo "<td>" . number_format($blValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountCLL= $totalAmountCLL + $cllValue[$counterh];
                            echo "<td>" . number_format($cllValue[$counterh],'2','.',',') . "</td>";
                            $totalamountCML= $totalamountCML + $cmlValue[$counterh];
                            echo "<td>" . number_format($cmlValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountEDL= $totalAmountEDL + $edlValue[$counterh];
                            echo "<td>" . number_format($edlValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountRL= $totalAmountRL + $rlValue[$counterh];
                            echo "<td>" . number_format($rlValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountPL= $totalAmountPL + $plValue[$counterh];
                            echo "<td>" . number_format($plValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountCL= $totalAmountCL + $clValue[$counterh];
                            echo "<td>" . number_format($clValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountCKL= $totalAmountCKL + $cklValue[$counterh];
                            echo "<td>" . number_format($cklValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountEML= $totalAmountEML + $emlValue[$counterh];
                            echo "<td>" . number_format($emlValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountSL= $totalAmountSL + $slValue[$counterh];
                            echo "<td>" . number_format($slValue[$counterh],'2','.',',') . "</td>";
                            
                            //$totalAmountSL= $totalAmountSL + $slValue[$counterh];
                            $totalPenaltyLoan = $totalPenaltyLoan + $penaltyLoan[$counterh];
                            echo "<td>" . number_format($penaltyLoan[$counterh],'2','.',',') . "</td>";
                            $totalRentalIncome = $totalRentalIncome + $RentalIncome[$counterh];
                            echo "<td>" . number_format($RentalIncome[$counterh],'2','.',',') . "</td>";

                            $totalAmountOI= $totalAmountOI + $oiValue[$counterh];
                            echo "<td>" . number_format($oiValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountSC= $totalAmountSC + $scValue[$counterh];
                            echo "<td>" . number_format($scValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountFD= $totalAmountFD + $fdValue[$counterh];
                            echo "<td>" . number_format($fdValue[$counterh],'2','.',',') . "</td>";

                            //TRADING
                            $totalAmountRCL= $totalAmountRCL + $rclValue[$counterh];
                            echo "<td>" . number_format($rclValue[$counterh],'2','.',',') . "</td>";

                            $totalRCLI= $totalRCLI + $rcliValue[$counterh];
                            echo "<td>" . number_format($rcliValue[$counterh],'2','.',',') . "</td>";

                            $totalAmountRCC= $totalAmountRCC + $rccValue[$counterh];
                            echo "<td>" . number_format($rccValue[$counterh],'2','.',',') . "</td>";

                            $totalRCCI= $totalRCCI + $rcciValue[$counterh];
                            echo "<td>" . number_format($rcciValue[$counterh],'2','.',',') . "</td>";

                            $totalPenaltyRice = $totalPenaltyRice + $penaltyRice[$counterh];
                            echo "<td>" . number_format($penaltyRice[$counterh],'2','.',',') . "</td>";

                            $totalAmountSD= $totalAmountSD + $sdValue[$counterh];
                            echo "<td>" . number_format($sdValue[$counterh],'2','.',',') . "</td>";
                            $totalAmountTD= $totalAmountTD + $tdValue[$counterh];
                            echo "<td>" . number_format($tdValue[$counterh],'2','.',',') . "</td>";
                            echo "<td>" . $dateTransaction[$counterh] . "</td>";
                            echo "<td>" . $encodedBy[$counterh] . "</td>";
                        echo "</tr>";
                    $counterh ++;
                }

                echo "<tr>";
                    echo "<td>" . "TOTAL" . "</td>";
                    echo "<td>" . "". "</td>";
                    echo "<td>" . "" . "</td>";
                    echo "<td>" . "" . "</td>";
                    echo "<td bgcolor =" . "#00FF00" . ">" . number_format($totalAmountS,'2','.',',') . "</td>";
                    echo "<td bgcolor =" . "#dae521" . ">" . number_format($totalTradingF,'2','.',',') . "</td>";
                    echo "<td bgcolor =" . "#21e5d6" . ">" . number_format($totalLendingF,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalInterestF,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountBL,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountCLL,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalamountCML,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountEDL,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountRL,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountPL,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountCL,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountCKL,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountEML,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountSL,'2','.',',') . "</td>";

                    //RENTAL
                    echo "<td>" . number_format($totalPenaltyLoan,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalRentalIncome,'2','.',',') . "</td>";

                    echo "<td>" . number_format($totalAmountOI,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountSC,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountFD,'2','.',',') . "</td>";

                    //TRADING
                    echo "<td>" . number_format($totalAmountRCL,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalRCLI,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalRCCI,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountRCC,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalPenaltyRice,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountSD,'2','.',',') . "</td>";
                    echo "<td>" . number_format($totalAmountTD,'2','.',',') . "</td>";
                    
                    echo "<td>" . "" . "</td>";
                    echo "<td>" . "" . "</td>";
                echo "</tr>";

                ?>
            </div>
            </div>
        </div>
    </form>
</div>
</body>
<?php include "css1.html" ?>
</html>