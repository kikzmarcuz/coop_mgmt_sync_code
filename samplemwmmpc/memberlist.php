<?php

require_once 'dbconnection.php';
require('public/fpdf181/fpdf.php');

/*echo "hello";
$mysqli = new mysqli("servername", "username", "password", "dbname");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT customerid, companyname, contactname, address, city, postalcode, country
FROM customers WHERE customerid = ?";

$stmt = $mysqli->prepare(sql);*/
$q = intval($_GET['q']);
echo "$q";

$sqlName = "SELECT * FROM  name_table";

/*if($searchMember != "" and $memberStatus != "" and $searchMember != "All"){
    $sqlName.= " WHERE type_membership = '$searchMember' and  member_status = '$memberStatus'  ";
}elseif($searchMember == "All" and $memberStatus != "All"){
    $sqlName.= " WHERE member_status = '$memberStatus'  ";
}*/

//$sqlName.= " WHERE member_status = '".$q."'  ";

$sqlName.= " order by last_name asc, first_name asc";

$resultName = $conn->query($sqlName);
$numRow = mysqli_num_rows($resultName);
$counter = 0;



echo "<table>
<tr>
    <th></th>
    <th>ID #</th>
    <th>Name</th>
    <th>Birth Place</th>
    <th>Birth Date</th>
    <th>TIN #</th>
    <th>SSS #</th>
    <th>Mobile #</th>
    <th>Status</th>

</tr>";

if($resultName->num_rows > 0){
    while ($row = mysqli_fetch_array($resultName)) {
        echo "<tr>";
            $number = $counter + 1;
            echo "<td>" . $number . "</td>";
            echo "<td>" . $row['id_number'] . "</td>";
            echo "<td>" . $row['account_number'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" .  $row['middle_name'] . "</td>";
        echo "</tr>";

        $counter++;
    }
}



/*
$sqlName = "SELECT * FROM  name_table";

if($searchMember != "" and $memberStatus != "" and $searchMember != "All"){
    $sqlName.= " WHERE type_membership = '$searchMember' and  member_status = '$memberStatus'  ";
}elseif($searchMember == "All" and $memberStatus != "All"){
    $sqlName.= " WHERE member_status = '$memberStatus'  ";
}

$sqlName.= " order by last_name asc, first_name asc";

$resultName = $conn->query($sqlName);
$numRow = mysqli_num_rows($resultName);
$counter = 0;

if($resultName->num_rows > 0){
    while ($row = mysqli_fetch_array($resultName)) {
        # code...
        $idNumber[$counter] = $row['id_number'];
        $accountNumber[$counter] = $row['account_number'];
        $firstName[$counter] = $row['first_name'];
        $middleName[$counter] = $row['middle_name'];
        $lastName[$counter] = $row['last_name'];
        $membershipStatus[$counter] = $row['member_status'];

        $counter++;
    }
}

$sqlOtherInfo = "SELECT * FROM  other_info_table";
$resultOtherInfo = $conn->query($sqlOtherInfo);
//$numRow = mysqli_num_rows($resultOtherInfo);
$counter = 0;

if($resultOtherInfo->num_rows > 0){
    while ($row = mysqli_fetch_array($resultOtherInfo)) {
        # code...
        $birthPlace[$counter] = $row['birth_place'];
        $birthDate[$counter] = $row['birth_date'];
        $tinNumber[$counter] = $row['tin_number'];
        $sssNumber[$counter] = $row['sss_number'];

        $counter++;
    }
}

$sqlContact = "SELECT * FROM  contact_table";
$resultContact = $conn->query($sqlContact);
//$numRow = mysqli_num_rows($resultContact);
$counter = 0;

if($resultContact->num_rows > 0){
    while ($row = mysqli_fetch_array($resultContact)) {
        # code...
        $mobileNumber[$counter] = $row['mobile_number'];

        $counter++;
    }
}

$pdf = new FPDF();

$rowCounter = 0;

$pdf->SetFont('Arial','B',9);
$pdf->AddPage('L','Legal', 0);

//foreach($header as $col)
$pdf->Cell(10,7,"#",1);
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
$countm = 0;
while($rowCounter < $numRow) {
        $countm++;
        $pdf->Cell(10,7,"$countm",1);
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
*/

?>