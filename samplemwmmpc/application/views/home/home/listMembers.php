<?php  

$idNumber [] = "";
$accountNumber [] = "";

$firstName  [] = "";
$middleName [] = "";
$lastName [] = "";

$birthPlace [] = "";
$birthDate  [] = "";
$tinNumber [] = "";
$sssNumber [] = "";

$mobileNumber [] = "";

$membershipStatus [] = "";

include 'dbconnection.php';

$sqlName = "SELECT * FROM  name_table";
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

        $counter++;
    }
}

$sqlOtherInfo = "SELECT * FROM  other_info_table";
$resultOtherInfo = $conn->query($sqlOtherInfo);
$numRow = mysqli_num_rows($resultOtherInfo);
$counter = 0;

if($resultOtherInfo->num_rows > 0){
    while ($row = mysqli_fetch_array($resultOtherInfo)) {
        # code...
        $birthPlace[$counter] = $row['birth_place'];
        $birthDate[$counter] = $row['birth_date'];
        $tinNumber[$counter] = $row['tin_number'];
        $sssNumber[$counter] = $row['sss_number'];
        $membershipStatus[$counter] = $row['member_status'];

        $counter++;
    }
}

$sqlContact = "SELECT * FROM  contact_table";
$resultContact = $conn->query($sqlContact);
$numRow = mysqli_num_rows($resultContact);
$counter = 0;

if($resultContact->num_rows > 0){
    while ($row = mysqli_fetch_array($resultContact)) {
        # code...
        $mobileNumber[$counter] = $row['mobile_number'];

        $counter++;
    }
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Loan Service</title>
    <?php include "css.html" ?>
</head>
<body>
<div>
    <?php include 'topbar.php';?>
    <form>
        <div class="row">
            <?php include 'navigation.php';?>
            <div class="col-sm-9 table table-dark" style="margin-top:70px;margin-left: 16.7%;">
                <p align="center">List of Members</p>
                <?php
                echo "<table>
                <tr>
                    <th>ID Number</th>
                    <th>Account Number</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Birth Place</th>
                    <th>Birth Date</th>
                    <th>TIN Number</th>
                    <th>SSS Number</th>
                    <th>Mobile Number</th>
                    <th>Member Status</th>

                </tr>";
                
                $counterh = 0;
                while($counterh < $numRow) {
                        echo "<tr>";
                            echo "<td>" . $idNumber[$counterh] . "</td>";
                            echo "<td>" . $accountNumber[$counterh] . "</td>";
                            echo "<td>" . $firstName[$counterh] . "</td>";
                            echo "<td>" . $middleName[$counterh] . "</td>";
                            echo "<td>" . $lastName[$counterh] . "</td>";
                            echo "<td>" . $birthPlace[$counterh] . "</td>";
                            echo "<td>" . $birthDate[$counterh] . "</td>";
                            echo "<td>" . $tinNumber[$counterh] . "</td>";
                            echo "<td>" . $sssNumber[$counterh] . "</td>";
                            echo "<td>" . $mobileNumber[$counterh] . "</td>";
                            echo "<td>" . $membershipStatus[$counterh] . "</td>";
                        echo "</tr>";
                    $counterh ++;
                }
                ?>
            </div>
        </div>
    </form>
</div>
</body>
<?php include "css1.html" ?>
</html>