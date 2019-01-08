<?php

//COMENT

require_once 'session.php';
require ("function.php");

$infomessage = "";

$sql5 = "UPDATE rice_loan_table SET
invoice_number = ''
WHERE loan_status = 'void' ";

if ($conn->query($sql5) === TRUE) {
  return(true);
} 
else{ 
  echo "Error: " . $sql5 . "<br>" . $conn->error;
}

echo "$infomessage";

?>


