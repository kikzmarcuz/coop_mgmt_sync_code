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

$sql = "ALTER TABLE rice_loan_table
CHANGE `last_oayment` last_payment DATE";

if ($conn->query($sql) === TRUE) {
    $infomessage = "SCRIPT RUN SUCCESS";
} 
else { 
      echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "$infomessage";

?>