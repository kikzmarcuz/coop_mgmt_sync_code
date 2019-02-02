<?php

//COMENT
require_once '../dbconnection.php';

$sqlupdate = "UPDATE rice_loan_table SET
invoice_number = ''
WHERE invoice_number = 'Void' ";

if($conn->query($sqlupdate) === true){
	echo "Rice Loan Table has beed updated";
}else{
	echo "Update failed";
}

?>


