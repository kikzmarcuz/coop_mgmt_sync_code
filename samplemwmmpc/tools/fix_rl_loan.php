<?php
require_once '../dbconnection.php';


/*$sql = "ALTER TABLE address_table
ADD street CHAR(30),
Add city CHAR(30) ,
ADD state CHAR(4) ,
ADD zipcode CHAR(20) ,
ADD phone CHAR(20) ";

$result = $conn->query($sql);

echo "$result";
*/

$infomessage="";

$sql = "SELECT * FROM rl_loan_table WHERE date_released >= '2019-01-01' and date_released <= '2019-01-30' ";

$resultLP = $conn->query($sql);

if($resultLP->num_rows > 0){
    while ($row = mysqli_fetch_array($resultLP)) {
        $loanid = $row['id_number'];
        $rlloanap = $row['loan_application_number'];


        /*$sqlrcl = "SELECT * FROM rl_credit_revenue_table WHERE id_number = '$loanid' and date_transaction >= '2019-01-01' and date_transaction <= '2019-01-30' ";

		$resultrcl = $conn->query($sqlrcl);

		if($resultrcl->num_rows > 0){
		    while ($rowrcl = mysqli_fetch_array($resultrcl)) {
		        $loanidrcl = $rowrcl['id_number'];
		        $rlloanaprcl = $rowrcl['loan_application_number'];

		        if($rlloanap != $rlloanaprcl){
		        	$sql2 = "UPDATE rl_credit_revenue_table SET
			        loan_application_number = '$rlloanap'
			 		WHERE id_number = '$loanid' and date_transaction >= '2019-01-01' and date_transaction <= '2019-01-30' ";

			        if ($conn->query($sql2) === TRUE) {
			            $infomessage = "Loan Application Number Updated";
			            echo "$infomessage";
			        } 
		        }
		    }
		}*/

		echo $loanid;

		$sqlrcl = "SELECT * FROM rl_loan_payment_table WHERE id_number = '$loanid' and date_payment >= '2019-01-01' and date_payment <= '2019-01-30' ";

		$resultrcl = $conn->query($sqlrcl);

		if($resultrcl->num_rows > 0){
		    while ($rowrcl = mysqli_fetch_array($resultrcl)) {
		    	echo "test";
		        $loanidrcl = $rowrcl['id_number'];
		        $rlloanaprcl = $rowrcl['loan_application_number'];
		        echo $rlloanap;
		        echo $rlloanaprcl;
		        if($rlloanap != $rlloanaprcl){
		        	echo "success";
		        	$sql2 = "UPDATE rl_loan_payment_table SET
			        loan_application_number = '$rlloanap'
			 		WHERE id_number = '$loanid' and date_payment >= '2019-01-01' and date_payment <= '2019-01-30' ";

			        if ($conn->query($sql2) === TRUE) {
			            $infomessage = "Loan Application Number Updated";
			            echo "$infomessage";
			        } 
		        }
		    }
		}


    }
}


?>