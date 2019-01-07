<?php

//COMENT

require_once 'session.php';
require ("function.php");

$startdate = date('Y-m-d');
$enddate = date('Y-m-d');


//container
$idnumber=[];
$firstname = [];
$middlename = [];
$lastname = [];
$fullname = [];
$referencenumber = [];

$ac[] = 0;
$sd[] = 0;
$bl[] = 0;
$cll[] = 0;
$cml[] = 0;
$edl[] = 0;
$rl[] = 0;
$pl[] = 0;
$ckl[] = 0;
$cl[] = 0;
$eml[] = 0;
$sl[] = 0;

$pnr[] = 0;
$pnl[] = 0;
$msc[] = 0;
$mbf[] = 0;

$date=[];
$encoded=[];
$clearOR="";
$jecount=0;

$searchReport = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["searchReport"])) {
        $searchReport = test_input($_POST["searchReport"]);
    }

    if (!empty($_POST["startdate"])) {
        $startdate = test_input($_POST["startdate"]);
    }

    if (!empty($_POST["enddate"])) {
        $enddate = test_input($_POST["enddate"]);
    }

    if (!empty($_POST["clearOR"])) {
        $clearOR = test_input($_POST["clearOR"]);
    }


    if($clearOR != ""){
    	$jelist=[];
	    $jeinfo=[];
	    $rtable=getTableName("JE");
	    $delid=getRepID($rtable,$clearOR,$conn);
	    $jelist=getJEInfoD($clearOR, $delid, $conn);
	    $jecount=count($jelist);
	    $jecounter=0;
	    
	    
	    while($jecounter<$jecount){
	    	$jeinfo=$jelist[$jecounter];
	    	if($jeinfo[5]==1){
	    		$actable=getTableName("AC");
	    		deleteOtherPayment($actable, $clearOR, $delid, $conn);
	    		
	        }


	        if($jeinfo[6]==1){
	    		$deptable=getDepositTable("SD");
	            deleteOtherPayment($deptable, $clearOR,  $delid, $conn);
	        }

	        if($jeinfo[7]==1){
	    		$sctable=getTableName("SC");
	            deleteOtherPayment($sctable, $clearOR,  $delid, $conn);
	        }

	        if($jeinfo[8]==1){
	            $oitable=getTableName("OI");
	            deleteOtherPayment($oitable, $clearOR,  $delid, $conn);
	        }

	        if($jeinfo[9]==1){
	            $oitable=getTableName("OI");
	            deleteOtherPayment($oitable, $clearOR,  $delid, $conn);
	        }

	        if($jeinfo[10]==1){
	            $oitable=getTableName("OI");
	            deleteOtherPayment($oitable, $clearOR,  $delid, $conn);
	        }

	        if($jeinfo[11]==1){
	            $oitable=getTableName("OI");
	            deleteOtherPayment($oitable, $clearOR,  $delid, $conn);
	        }

	        if($jeinfo[13]==1){
	            $ltable = getLoanTableName("BL");
                $ptable = getLoanPrincipalTableName("BL");
                $itable = getLoanInterestTableName("BL");
                $apnumber = getApplicationNumberP($clearOR, $ptable, $conn);
                
                if(getLoanStatus($apnumber, $ltable , $conn)   == "Paid"){
                    updateLoanStatus($apnumber, $ltable , $conn);
                }

                deleteLoanPaymentD($ptable, $itable, $clearOR, $delid ,$conn);
	        }

	        if($jeinfo[14]==1){
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

	        if($jeinfo[15]==1){
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

	        if($jeinfo[15]==1){
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

	        if($jeinfo[16]==1){
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

	        if($jeinfo[17]==1){
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

	        if($jeinfo[18]==1){
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

	        if($jeinfo[19]==1){
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

	        if($jeinfo[20]==1){
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

	        if($jeinfo[21]==1){
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

	        if($jeinfo[21]==1){
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

	        if($jeinfo[22]==1){
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
	        $jecounter++;
		}
    }

    if($searchReport == "searchReport"){
	    $jelist=[];
	    $jeinfo=[];
	    $jelist=geJEInfo($startdate, $enddate, $conn);
	    $jecount=count($jelist);
	    $jecounter=0;
	    
	    
	    while($jecounter<$jecount){
	    	$jeinfo=$jelist[$jecounter];
	    	$referencenumber[$jecounter] = $jeinfo[1];
	    	$idnumber[$jecounter] = $jeinfo[2];
	    	$date[$jecounter]=$jeinfo[3];
	    	$encoded[$jecounter]=$jeinfo[4];
	    	$minfo=[];

	    	if($jeinfo[5]==1){
	    		$actable=getTableName("AC");
	    		$caarr=[];
	    		$caarr=getChartAccountInfo($actable, $idnumber[$jecounter], 5, $conn);
	    		$fullname[$jecounter]=$caarr[4];

	            $acarr=[];
	            $acarr=getCAInfo($actable, $idnumber[$jecounter], $referencenumber[$jecounter], 5, $conn);
	            $ac[$jecounter] = $acarr[6];
	            $cr_dr[$jecounter] = $acarr[4];
	        }else{
	        	$ac[$jecounter]=0;
	        	$cr_dr[$jecounter]="";
	        }


	        if($jeinfo[6]==1){
	            $minfo=seaarchMember($idnumber[$jecounter], 5, $conn);
	            $firstName[$jecounter] = $minfo[2];
	            $middleName[$jecounter] = $minfo[3];
	            $lastName[$jecounter] = $minfo[4];
	            $fullname[$jecounter] = $lastName[$jecounter] . ", " . $middleName[$jecounter] . $firstName[$jecounter];

	    		$deptable=getDepositTable("SD");
	            $deparr=[];
	            $deparr=getDepositInfo($deptable, $idnumber[$jecounter], $referencenumber[$jecounter], 5, $conn);
	            $sd[$jecounter] = $deparr[6];
	        }else{
	        	$sd[$jecounter]=0;
	        }

	        if($jeinfo[7]==1){
	            $minfo=seaarchMember($idnumber[$jecounter], 5, $conn);
	            $firstName[$jecounter] = $minfo[2];
	            $middleName[$jecounter] = $minfo[3];
	            $lastName[$jecounter] = $minfo[4];
	            $fullname[$jecounter] = $lastName[$jecounter] . ", " . $middleName[$jecounter] . $firstName[$jecounter];

	    		$sctable=getTableName("SC");
	            $scarr=[];
	            
	            $scarr=getSCInfo($sctable, $idnumber[$jecounter], $referencenumber[$jecounter], 5, $conn);
	            //echo "$scarr";
	            //echo "$scarr[0]";
	            $sc[$jecounter] = $scarr[5];


	        }else{
	        	$sc[$jecounter]=0;
	        }

	        if($jeinfo[8]==1){
	            $minfo=seaarchMember($idnumber[$jecounter], 5, $conn);
	            $firstName[$jecounter] = $minfo[2];
	            $middleName[$jecounter] = $minfo[3];
	            $lastName[$jecounter] = $minfo[4];
	            $fullname[$jecounter] = $lastName[$jecounter] . ", " . $middleName[$jecounter] . $firstName[$jecounter];

	    		$oitable=getTableName("OI");
	            $oiarr=[];
	            $oiarr=getOIInfo($oitable, $idnumber[$jecounter], $referencenumber[$jecounter], "plti", 5, $conn);
	            $pnl[$jecounter] = $oiarr[4];
	        }else{
	        	$pnl[$jecounter]=0;
	        }

	        if($jeinfo[9]==1){
	            $minfo=seaarchMember($idnumber[$jecounter], 5, $conn);
	            $firstName[$jecounter] = $minfo[2];
	            $middleName[$jecounter] = $minfo[3];
	            $lastName[$jecounter] = $minfo[4];
	            $fullname[$jecounter] = $lastName[$jecounter] . ", " . $middleName[$jecounter] . $firstName[$jecounter];

	    		$oirtable=getTableName("OI");
	            $oirarr=[];
	            $oirarr=getOIInfo($oirtable, $idnumber[$jecounter], $referencenumber[$jecounter], "pnti", 5, $conn);
	            $pnr[$jecounter] = $oirarr[4];
	        }else{
	        	$pnr[$jecounter]=0;
	        }

	        if($jeinfo[10]==1){
	            $minfo=seaarchMember($idnumber[$jecounter], 5, $conn);
	            $firstName[$jecounter] = $minfo[2];
	            $middleName[$jecounter] = $minfo[3];
	            $lastName[$jecounter] = $minfo[4];
	            $fullname[$jecounter] = $lastName[$jecounter] . ", " . $middleName[$jecounter] . $firstName[$jecounter];

	    		$oimtable=getTableName("OI");
	            $oimarr=[];
	            $oimarr=getOIInfo($oimtable, $idnumber[$jecounter], $referencenumber[$jecounter], "msli", 5, $conn);
	            $msc[$jecounter] = $oimarr[4];
	        }else{
	        	$msc[$jecounter]=0;
	        }

	        if($jeinfo[11]==1){
	    		$actable=getTableName("AC");
	    		$caarr=[];
	    		$caarr=getChartAccountInfo($actable, $idnumber[$jecounter], 5, $conn);
	    		$fullname[$jecounter]=$caarr[4];

	            $acarr=[];
	            $acarr=getCAInfo($actable, $idnumber[$jecounter], $referencenumber[$jecounter], 5, $conn);
	            $ac[$jecounter] = $acarr[6];
	            $cr_dr[$jecounter] = $acarr[4];
	        }else{
	        	$ac[$jecounter]=0;
	        	$cr_dr[$jecounter]="";
	        }

	        $jecounter++;
		}
	}
 }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Daily Report</title>
    <?php include "css.html" ?>
</head>
<body>

<div style="position: relative;">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <?php //include 'topbar.php';?>

        <div class="row">
            <?php include 'navigation.php';?>
            <div style="margin-top:70px;margin-left: 16.7%;margin-bottom: 20px;">
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-10">
                            <div class="col-md-10">
                                <input type="date" style="width: 150px;" value = "<?php echo $startdate;?>" name = "startdate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-10">
                            <div class="col-md-10">
                                <input type="date" style="width: 150px;" value = "<?php echo $enddate;?>" name = "enddate">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-10 form">
                            <button class="btn btn-outline-success my-2 my-sm-0" name = "searchReport" value = "searchReport" type="submit" style="align-self: center;">SEARCH</button>
                        </div>
                    </div>
                </div>

                <div class="table table-bordered table-striped table-hover table-dark">
		        	<?php
		                echo "<table>
		    			<tr>
		                    <th></th>
		                    
		                    <th>ID #__________</th>
		                    <th>MEMBER NAME_______________________________</th>
		                    <th>JOURNAL #</th>
		                    <th>CR_DR</th>
		                    <th>CA  AMOUNT</th>
		                    <th>SDI  AMOUNT</th>
		                    <th>SCW  AMOUNT</th>
		                    <th>Date_______</th>
		                    <th>Encoder</th>
		                </tr>";
		                $tablecounter=0;
		                while($tablecounter < $jecount) {
		                    echo "<tr>";
		                        echo "<td>  <button class =". "deletebutton". " "  . "type =" . "submit" . " " . " " ."value=". "$referencenumber[$tablecounter]" . " " . "name=" . "clearOR". ">"  . "CLEAR" . " </button> </td>";
		                        
		                        
		                        echo "<td>" . $idnumber[$tablecounter] . "</td>";

		                        echo "<td>" . $fullname[$tablecounter] . "</td>";
		                        
		                        echo "<td>" . $referencenumber[$tablecounter] . "</td>";

		                        if($cr_dr[$tablecounter] != ""){
		                        	echo "<td>" . $cr_dr[$tablecounter] . "</td>";
		                        }else{
		                        	echo "<td>" . "" . "</td>";
		                        }


		                        if($ac[$tablecounter] != 0){
		                        	echo "<td>" . $ac[$tablecounter] . "</td>";
		                        }else{
		                        	echo "<td>" . "" . "</td>";
		                        }
		                        
		                        if($sd[$tablecounter] != 0){
		                        	echo "<td>" . $sd[$tablecounter] . "</td>";
		                        }else{
		                        	echo "<td>" . "" . "</td>";
		                        }
		                       
		                        
		                        if($sc[$tablecounter] != 0){
		                        	echo "<td>" . $sc[$tablecounter] . "</td>";
		                        }else{
		                        	echo "<td>" . "" . "</td>";
		                        }
		 
		                        echo "<td>" . $date[$tablecounter] . "</td>";
		                        echo "<td>" . $encoded[$tablecounter] . "</td>";
		                    echo "</tr>";
		                    $tablecounter ++;
		                }
		            ?>
		        </div>
        </div>

        
    </form>
</div>
</body>
</html>
