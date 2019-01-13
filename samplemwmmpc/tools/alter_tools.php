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

$sqlbi = "SELECT * FROM "; 
$sqlbi .= $table;
if($apnumber == ""){
$sqlbi .= " WHERE id_number = '$idnumber' and loan_status = 'Released' and loan_status != 'Paid' ";
}else{
$sqlbi .= " WHERE loan_application_number = '$apnumber' ";
}

?>