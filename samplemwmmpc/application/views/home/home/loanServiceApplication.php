<!DOCTYPE html>
<html>

<?php  

$idNumber = "";
$firstName = "";
$middleName = "";
$lastName = "";
$accountNumber = "";

$loanApplicationNumber = "";

$loanServiceId = "";
$loanServiceType = "";
$loanServiceNameL = "";
$loanServiceName = "";
$loanServiceEntitlement = "";
$loanableAmountMin = "";
$loanableAmountMax = "";

$loanAmount = "";
//$loanInterest = "";
$loanTerm = "";
$loanStatus = "";

$dateApplication = "";
$dateApprovedDenied = "";
$dateReleased = "";
$datePaid = "";

$reviewedBy = "";
$approveddeniedBy = "";
$releasedBy = "";

$countErr = "";
$submitApplication = "";
$searchMember = "";
$identifier = "";

include 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["submitApplication"])) {
        $countErr++;
    }else {
        $submitApplication = test_input($_POST["submitApplication"]);
    }

    if (empty($_POST["searchMember"])) {
        $countErr++;
    }else {
        $searchMember = test_input($_POST["searchMember"]);
    }

	if (empty($_POST["idNumber"])) {
	  	$countErr++;
	}else {
    	$idNumber = test_input($_POST["idNumber"]);
  	}

    if (empty($_POST["loanApplicationNumber"])) {
        $countErr++;
    }else {
        $loanApplicationNumber = test_input($_POST["loanApplicationNumber"]);
    }

    if (empty($_POST["loanServiceId"])) {
        $countErr++;
    }else {
        $loanServiceId = test_input($_POST["loanServiceId"]);
    }

    if (empty($_POST["loanAmount"])) {
        $countErr++;
    }else {
        $loanAmount = test_input($_POST["loanAmount"]);
    }

    if (empty($_POST["loanTerm"])) {
        $countErr++;
    }else {
        $loanTerm = test_input($_POST["loanTerm"]);
    }

    if (empty($_POST["dateApplication"])) {
        $countErr++;
    }else {
        $dateApplication = test_input($_POST["dateApplication"]);
    }

    if ($searchMember = "searchMember") {
        # search member...
        $sqlSearchName = "SELECT * FROM name_table WHERE id_number = '$idNumber'";
        $resultSearchName = $conn->query($sqlSearchName);

        if($resultSearchName->num_rows > 0){
            while($row = mysqli_fetch_array($resultSearchName)){
              $accountNumber = $row['account_number'];
              $firstName = $row['first_name'];
              $middleName = $row['middle_name'];
              $lastName = $row['last_name'];
            }
        }
    }

  	

	if (empty($_POST["loanServiceNameL"])){
    	$countErr++;
	} else {
	    $loanServiceNameL = test_input($_POST["loanServiceNameL"]);
	}

    if($loanServiceNameL != ""){

        $sqlSeaarchLS =  "SELECT * FROM loan_services_table WHERE loan_service_name = '$loanServiceNameL'";
        $resultSEarchLS = $conn->query($sqlSeaarchLS);

    	while($row = mysqli_fetch_array($resultSEarchLS)){
    		$loanServiceId = $row['loan_service_id'];
    		$loanServiceName = $row['loan_service_name'];
    		$loanServiceType = $row['loan_service_type'];
            $loanServiceEntitlement = $row['loan_service_entitlement'];
    		$loanableAmountMin = $row['loanable_amount_min'];
    		$loanableAmountMax = $row['loanable_amount_max'];
    	}
    }

    
    if($submitApplication == "submitApplication"){

        $sql = "INSERT INTO loan_table(id_number, loan_application_number, loan_service_id,loan_amount, loan_term, loan_status) 
                VALUES ('$idNumber','$loanApplicationNumber','$loanServiceId','$loanAmount','$loanTerm', 'Review')";

        if ($conn->query($sql) === TRUE){
            $informessage = "New record created successfully";
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $sql1 = "INSERT INTO loan_date_table(loan_application_number, date_application) 
                VALUES ('$loanApplicationNumber','$dateApplication')";

        if ($conn->query($sql1) === TRUE){
            $informessage = "New record created successfully";
        }else{
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }

        $sql2 = "INSERT INTO loan_encoder_table(loan_application_number, encoded_by) 
                VALUES ('$loanApplicationNumber','1')";

        if ($conn->query($sql2) === TRUE){
            $informessage = "New record created successfully";
        }else{
            echo "Error: " . $sql1 . "<br>" . $conn->error;
        }
    }
}

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<head>
    <?php include "css.html" ?>
    <title>Loan Application</title>
</head>

<body>
<div>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    	<div>
            <?php include 'topbar.php';?>
    	    <!--member account info-->
            <div class="row" >
                <?php include 'navigation.php';?>
                <div class="col-sm-10" style="margin-top:70px;margin-left: 16.7%;">
                    
                    <div class="row">
                        <div class="col-lg-5" style="background-color:#fff; padding: 10px; margin: 10px">
                            <h5>Account Information</h5>
                            <div class="form-group">
                                <label class="col-md-6 control-label">ID Number</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $idNumber;?>" name = "idNumber">
                                </div>
                            </div>


                            <div>
                                <button class="btn btn-outline-success my-2 my-sm-0" name = "searchMember" value = "searchMember" type="submit" style="align-self: center;">Submit</button>
                            </div>
                            <div class="form-group">
                                <label class="col-md-6 control-label">Account Number</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $accountNumber;?>" readonly>
                                </div>  
                            </div>
                            

                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="First Name" value = "<?php echo $firstName;?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Middle Name" value = "<?php echo $middleName;?>" reaadonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Last Name" value = "<?php echo $lastName;?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">

                        <div class="col-lg-5" style="background-color:#fff; padding: 10px; margin: 10px">
                            <h5>Loan Service</h5>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <select class="form-control" id="loanServiceNameL" name= "loanServiceNameL" onchange="this.form.submit()">-->
                                        <?php
                                            $sqlloanServiceName = "SELECT DISTINCT loan_service_name FROM loan_services_table ORDER BY loan_service_name ASC";
                                            $resultloanServiceName = $conn->query($sqlloanServiceName);
                                            $countLoanID = 0;
                                            echo '<option value='.''.'>'.'Select Loan Service'.'</option>';
                                            while($loanServiceNameList = mysqli_fetch_array($resultloanServiceName)) {
                                                $countLoanID ++;
                                                echo '<option value="'.$loanServiceNameList[0].'">'.$loanServiceNameList[0].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $loanServiceId;?>" name = "loanServiceId" placeholder="Loan Service ID" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $loanServiceType;?>" name = "loanServiceType" placeholder="Loan Type" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $loanServiceName;?>" name = "loanServiceName" placeholder="Loan Service Name" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $loanServiceEntitlement;?>" name = "loanServiceEntitlement" placeholder="Loan Service Entitlement" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $loanableAmountMin;?>" name = "loanableAmountMin" placeholder="Loanable Minimum Amount" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $loanableAmountMax;?>" name = "loanableAmountMax" placeholder="Loanable Maximum Amount" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5" style="background-color:#fff; padding: 10px; margin: 10px">
                            <h5>Loan Application</h5>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $loanApplicationNumber;?>" name = "loanApplicationNumber" placeholder="Loan Application Number">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $loanAmount;?>" name = "loanAmount" placeholder="Loan Amount">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" value = "<?php echo $loanTerm;?>" name = "loanTerm" placeholder="Loan Term">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                    <input type="date" class="form-control" value = "<?php echo $dateApplication;?>" name = "dateApplication">
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-outline-success my-2 my-sm-0" name = "submitApplication" value = "submitApplication" type="submit" style="align-self: center;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
	</form>
</div>

</body>
    <?php include "css1.html" ?>
</html>