<?php

include '../database/dbconnection.php';

function getUserInfo($fpara , $spara){
	$conn = dbconnection();
	$sqlName = "SELECT * FROM user_account_table
	WHERE  user_name = '$fpara' and user_password = '$spara' ";

	$resultName = $conn->query($sqlName);
	$count =  mysqli_num_rows($resultName) ;

	return($count);

}

?>