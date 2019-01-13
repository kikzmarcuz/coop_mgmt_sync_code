<?php  

require_once 'session.php';

$idNumber = "";
$idNumberF = "";
$accountNumber = "";

$firstName = "";
$middleName = "";
$lastName = "";

$firstNameT = "";
$middleNameT = "";
$lastNameT = "";

$presentAddress = "";
$permanentAddress = "";
$provincialAddress = "";

$birthPlace = "";
$birthDate = "";
$tinNumber = "";
$sssNumber = "";
$religion = "";
$educationalAttainment = "";
$brNumber = "";
$occupation = "";
$gender = "";
$civilStatus = "";

$mobileNumber = "";
$emailAddress = "";
$emergencyContactName = "";
$emergencyContactNumber = "";

$memberOrigin = "";
$referalIdNumber = "";
$membershipStatus = "";

$infomessage = "";

$identifier = "";
$countErr = "";

$searchMember = "";
$submitApplication = "";
$dateMembership = "";


$exitB = "";

$sql = "SELECT * FROM name_table";
$result = $conn->query($sql);
$count = mysqli_num_rows($result);

$date = date("Y");
$idNumber = $count + 1;
$idNumberF = $date . '-' .$idNumber;
$accountNumber = 'MWMMPC' . $idNumber;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if(!empty($_POST["idNumber"])){
		$idNumber = test_input($_POST["idNumber"]);
	}

  if(!empty($_POST["identifier"])){
    $identifier = test_input($_POST["identifier"]);
  }

  if(!empty($_POST["submitApplication"])){
    $submitApplication = test_input($_POST["submitApplication"]);
  }
  if(!empty($_POST["searchMember"])){
    $searchMember = test_input($_POST["searchMember"]);
  }

  if(!empty($_POST["exitB"])){
    $exitB = test_input($_POST["exitB"]);
  }

  if($exitB == "exitB"){
    session_destroy();
    header("Location: http://localhost/projectkikz/samplemwmmpc/application/views/home/login.php");
  }

  if($searchMember == "searchMember"){
    $sqlSearchName = "SELECT * FROM name_table WHERE CONCAT(first_name, ' ', last_name) LIKE '%$identifier%' OR last_name LIKE '%$identifier%' or  id_number = '$identifier' ";
    $resultSearchName = $conn->query($sqlSearchName);

    if($resultSearchName->num_rows > 0){
        while($row = mysqli_fetch_array($resultSearchName)){
          $referalIdNumber = $row['id_number'];
          $firstNameT = $row['first_name'];
          $middleNameT = $row['middle_name'];
          $lastNameT = $row['last_name'];
        }
    }
  }

  if (empty($_POST["accountNumber"])) {
    $countErr++;
  }else {
    $accountNumber = test_input($_POST["accountNumber"]);
  }

	if (empty($_POST["firstName"])) {
	  $countErr++;
	 }else {
    $firstName = test_input($_POST["firstName"]);
    // check if first name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
      $countErr++;
    }
  }

	if(!empty($_POST["middleName"])){
		  $middleName = test_input($_POST["middleName"]);
	}
	  
  if (empty($_POST["lastName"])) {
    $countErr++;
  } else {
    $lastName = test_input($_POST["lastName"]);
    // check if first name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
      $countErr++;
    }
  }

  /*if (!empty($_POST["firstNameT"])) {
    $firstNameT = test_input($_POST["firstNameT"]);
    // check if first name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstNameT)) {
      $countErr++;
    }
  }


  if(!empty($_POST["middleNameT"])){
      $middleNameT = test_input($_POST["middleNameT"]);
  }
    
  if (!empty($_POST["lastNameT"])) {
    $lastNameT = test_input($_POST["lastNameT"]);
      // check if first name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastNameT)) {
      $countErr++;
    }
  }*/

  //Set value of variables of address information
  if (!empty($_POST["presentAddress"])) {
    $presentAddress = test_input($_POST["presentAddress"]);
  }
  if (!empty($_POST["permanentAddress"])) {
    $permanentAddress = test_input($_POST["permanentAddress"]);
  }
  if (empty($_POST["provincialAddress"])) {
    $provincialAddress = test_input($_POST["provincialAddress"]);
  }

  

  //Set value of variables of birth information
  if (!empty($_POST["birthPlace"])) {
    $birthPlace = test_input($_POST["birthPlace"]);
  }

  if (empty($_POST["birthDate"])) {
    $birthDate = test_input($_POST["birthDate"]);
  }


  if (!empty($_POST["tinNumber"])) {
    $tinNumber = test_input($_POST["tinNumber"]);
  }

  if (!empty($_POST["sssNumber"])) {
    $sssNumber = test_input($_POST["sssNumber"]);
  }

  if (!empty($_POST["religion"])) {
    $religion = test_input($_POST["religion"]);
  }

  if (!empty($_POST["educationalAttainment"])) {
    $educationalAttainment = test_input($_POST["educationalAttainment"]);
  }

  if (!empty($_POST["occupation"])) {
    $occupation = test_input($_POST["occupation"]);
  }
  
  if(!empty($_POST["brNumber"])) {
    $brNumber = test_input($_POST["brNumber"]);
  }

  if (empty($_POST["gender"])) {
    $countErr++;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["civilStatus"])) {
    $countErr++;
  } else {
    $civilStatus = test_input($_POST["civilStatus"]);
  }

    //Set value of variables of contact information

  if (!empty($_POST["emailAddress"])) {
    $emailAddress = test_input($_POST["emailAddress"]);
  }
  

  if (empty($_POST["mobileNumber"])) {
    $mobileNumber = test_input($_POST["mobileNumber"]);
  }

  if (empty($_POST["emergencyContactName"])) {
    $emergencyContactName = test_input($_POST["emergencyContactName"]);
  }

  if (empty($_POST["emergencyContactNumber"])) {
    $emergencyContactNumber = test_input($_POST["emergencyContactNumber"]);
  }

  if (empty($_POST["membershipStatus"])) {
    $countErr++;
  } else {
    $membershipStatus= test_input($_POST["membershipStatus"]);
  }

  if (!empty($_POST["memberOrigin"])) {
    $memberOrigin= test_input($_POST["memberOrigin"]);
  }

  if (!empty($_POST["referalIdNumber"])) {
    $referalIdNumber= test_input($_POST["referalIdNumber"]);
  }

  if (empty($_POST["typeMembership"])) {
    $countErr++;
  } else {
    $typeMembership= test_input($_POST["typeMembership"]);
  }

  if (empty($_POST["dateMembership"])) {
    $countErr++;
  } else {
    $dateMembership= test_input($_POST["dateMembership"]);
  }

  if($submitApplication == "submitApplication"){
    if ($countErr == 0){
  	    $sql = "INSERT INTO name_table(id_number,account_number, first_name, middle_name, last_name, type_membership, referral, member_status, date_membership, encoded_by) 
  	    VALUES ('$idNumberF','$accountNumber', '$firstName','$middleName','$lastName', '$typeMembership' ,'$referalIdNumber', '$membershipStatus', '$dateMembership' ,'$encodedBy')";
  	    $sql1 = "INSERT INTO address_table(id_number,present_address, permanent_address, provincial_address) 
  	    VALUES ('$idNumberF','$presentAddress','$permanentAddress','$provincialAddress')";

  	    $sql2 = "INSERT INTO contact_table(id_number,mobile_number, email_address, emergency_contact_name, emergency_contact_number) 
  	    VALUES ('$idNumberF','$mobileNumber','$emailAddress','$emergencyContactName', '$emergencyContactNumber')";

  	    $sql3 = "INSERT INTO other_info_table(id_number,birth_place, birth_date, tin_number, sss_number, religion,educational_attainment, occupation, br_number, gender, civil_status) 
  	    VALUES ('$idNumberF','$birthPlace','$birthDate','$tinNumber','$sssNumber', '$religion','$educationalAttainment', '$occupation', '$brNumber', '$gender', '$civilStatus')";

  	    if ($conn->query($sql) === TRUE and $conn->query($sql1) === TRUE and $conn->query($sql2) === TRUE and $conn->query($sql3) === TRUE) {
  	        
  	    $infomessage = "New record created successfully";
  	        
  	    $firstName = "";
  			$middleName = "";
  			$lastName = "";

        $identifier = ""; 
        $firstNameT = "";
        $middleNameT = "";
        $lastNameT = "";

  			$presentAddress = "";
  			$permanentAddress = "";
  			$provincialAddress = "";

  			$birthPlace = "";
  			$birthDate = "";
  			$tinNumber = "";
  			$sssNumber = "";
  			$religion = "";
  			$educationalAttainment = "";
  			$brNumber = "";
  			$occupation = "";
  			$gender = "";
  			$civilStatus = "";

  			$mobileNumber = "";
  			$emailAddress = "";
  			$emergencyContactName = "";
  			$emergencyContactNumber = "";

  			$referalIdNumber = "";
  			$membershipStatus = "";

        $sql = "SELECT * FROM name_table";
        $result = $conn->query($sql);
        $count = mysqli_num_rows($result);

        $idNumber = $count + 1;
        $accountNumber = 'MWMMPC' . $idNumber;

  	    } else { 
  	          echo "Error: " . $sql . "<br>" . $conn->error;
  	          echo "Error: " . $sql1 . "<br>" . $conn->error;
  	          echo "Error: " . $sql2 . "<br>" . $conn->error;
  	          echo "Error: " . $sql3 . "<br>" . $conn->error;
  	    }

  	    $conn->close();
    }
  else{
    $infomessage = "FILL UP EMPTY FIELDS";
    }
  }
}

?>


<div class="pagenavbar">
  <label>HELLO</label>
</div>

<br><br><br><br><br><br><br>

<div class="pagearea">
  <label>WORLD</label>
</div>

