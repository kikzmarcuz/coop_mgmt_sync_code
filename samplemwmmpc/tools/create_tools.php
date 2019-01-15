<?php
require_once '../dbconnection.php';


$infomessage="";

$sql = "CREATE TABLE journal_report_table (
transaction_number INT(255),
id_number VARCHAR(255),
account_code VARCHAR(255),
cr_dr VARCHAR(255),
reference_number VARCHAR(255),
journal_number_temp INT(255),
sc INT(1),
sd INT(1),
ac INT(1),
amount DECIMAL(65,2),
remarks VARCHAR(255),
journal_flag INT(1),
date_transaction DATE,
encoded_by VARCHAR(255) )";

if ($conn->query($sql) === TRUE) {
    $infomessage = "SCRIPT RUN SUCCESS";
} 
else { 
      echo "Error: " . $sql . "<br>" . $conn->error;
}
echo "$infomessage";

$infomessage2="";
$sqlll = "ALTER TABLE rl_loan_table
MODIFY `loan_application_number` VARCHAR(255)";

if ($conn->query($sqlll) === TRUE) {
    $infomessage2 = "DATA TYPE CHANGE SUCCESS";
} 
else { 
      echo "Error: " . $sqlll . "<br>" . $conn->error;
}
echo "$infomessage2";

?>