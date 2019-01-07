<?php
	require_once 'session.php';
	//Date Released
	/*$sqlP = "SELECT * FROM  bl_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE bl_loan_table SET
				    date_released = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }

    $sqlP = "SELECT * FROM  ckl_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE ckl_loan_table SET
				    date_released = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }


    $sqlP = "SELECT * FROM  cl_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE cl_loan_table SET
				    date_released = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }

    
    $sqlP = "SELECT * FROM  edl_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE edl_loan_table SET
				    date_released = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }

    
    $sqlP = "SELECT * FROM  cml_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE cml_loan_table SET
				    date_released = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }

    $sqlP = "SELECT * FROM  eml_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE eml_loan_table SET
				    date_released = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }

    
    $sqlP = "SELECT * FROM  pl_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE pl_loan_table SET
				    date_released = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }


    $sqlP = "SELECT * FROM  rice_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE rice_loan_table SET
				    date_released = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }	

    

    $sqlP = "SELECT * FROM  rl_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE rl_loan_table SET
				    date_released = '$monthDate',
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }

    
    $sqlP = "SELECT * FROM  sl_loan_table";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  loan_date_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_released'];
                    
                    $sql = "UPDATE sl_loan_table SET
				    date_released = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }*/


    //Date Paid
    /*$sqlP = "SELECT * FROM  bl_loan_table WHERE loan_status = 'Paid' ";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  bl_loan_payment_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    $monthDate = $rowLD['date_payment'];
                    
                    $sql = "UPDATE bl_loan_table SET
				    date_paid = '$monthDate'
				    WHERE loan_application_number = '$loanApplicationNumber' ";

				    if ($conn->query($sql) === TRUE) {
				        $infomessage = "Record updated successfully";
				         //echo "$infomessage";
				     } 

				    else { 
				        echo "Error: " . $sql . "<br>" . $conn->error;
				    }
                }
            }
        }
    }*/

    /*$sql = "UPDATE rice_loan_table SET
    invoice_number = '1000'
    WHERE invoice_number = 'BBRCL' ";

    if ($conn->query($sql) === TRUE) {
        $infomessage = "Record updated successfully";
         //echo "$infomessage";
     } 

    else { 
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/

    $paymentI = 0;
    $totalPaymentI = 0;
    $totalPaymentP = 0;
    $paymentP = 0;

    $reference = "";


    //Transfer Reloan
    /*$sqlP = "SELECT * FROM  pl_loan_table WHERE loan_status = 'Paid' ";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  pl_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    # code...
                    
                    $reference = $rowLD['reference_number'];

                    if(substr($reference, 0,2) == "RL" or substr($reference, 0,2) == "BL" or substr($reference, 0,3) == "EDL" or substr($reference, 0,3) == "CML"){

                        $paymentI = $rowLD['interest_revenue'];
                        $totalPaymentI = $totalPaymentI + $paymentI;

                        $sqlD = "SELECT * FROM  pl_loan_payment_table WHERE reference_number = '$reference' ";
                        $resultD = $conn->query($sqlD);
                        //$numRow = mysqli_num_rows($resultName);

                        if($resultD->num_rows > 0){
                            while ($rowD = mysqli_fetch_array($resultD)) {
                                # code...
                                $paymentP = $rowD['amount'];
                                $totalPaymentP = $totalPaymentP + $paymentP;
                            }
                        }

                        echo "$loanApplicationNumber ";
                        echo "$totalPaymentP ";
                        echo "$totalPaymentI /n";

                    }
                }
            }


            $sql = "UPDATE pl_loan_table SET
            reloan_p = '$totalPaymentP',
            reloan_i = '$totalPaymentI'
            WHERE loan_application_number = '$loanApplicationNumber' ";

            if ($conn->query($sql) === TRUE) {
                $infomessage = "Record updated successfully";
                 //echo "$infomessage";\

                $paymentI = 0;
                $totalPaymentI = 0;
                $totalPaymentP = 0;
                $paymentP = 0;

                $reference = "";
            } 

            else { 
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }*/

    //Transfer last payment
    /*
    $sqlP = "SELECT * FROM  pl_loan_table WHERE loan_status = 'Paid' or  loan_status = 'Released'";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);
    $dateTransaction = "";

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sqlLD = "SELECT * FROM  pl_credit_revenue_table WHERE loan_application_number = '$loanApplicationNumber' ";
            $resultLD = $conn->query($sqlLD);
            //$numRow = mysqli_num_rows($resultName);

            if($resultLD->num_rows > 0){
                while ($rowLD = mysqli_fetch_array($resultLD)) {
                    $dateTransaction = $rowLD['date_transaction'];
                }
            }


            $sql = "UPDATE pl_loan_table SET
            last_payment = '$dateTransaction'
            WHERE loan_application_number = '$loanApplicationNumber' ";

            if ($conn->query($sql) === TRUE) {
                $infomessage = "Record updated successfully";
                $dateTransaction = "";
                echo "$infomessage";
            } 

            else { 
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }


    */



    /*$sql = "UPDATE pl_loan_table SET
    reloan_p = '',
    reloan_i = '' ";

    if ($conn->query($sql) === TRUE) {
        $infomessage = "Record updated successfully";
         //echo "$infomessage";
    } 

    else { 
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/

    /*$dateLimit = '2018-08-31';

    $sqlP = "SELECT * FROM  rice_loan_table WHERE date_released <= '$dateLimit' ";
    $resultP = $conn->query($sqlP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];

            $sql = "DELETE FROM rice_loan_table
            WHERE loan_application_number = '$loanApplicationNumber' ";

            if ($conn->query($sql) === TRUE) {
                $infomessage = "Record updated successfully";
                echo "$infomessage";
            } 

            $sql = "DELETE FROM rice_loan_payment_table
            WHERE loan_application_number = '$loanApplicationNumber' ";

            if ($conn->query($sql) === TRUE) {
                $infomessage = "Record updated successfully";
                echo "$infomessage";
            } 

            else { 
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $sql = "DELETE FROM rice_credit_revenue_table
            WHERE loan_application_number = '$loanApplicationNumber' ";

            if ($conn->query($sql) === TRUE) {
                $infomessage = "Record updated successfully";
                echo "$infomessage";
            } 

            else { 
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $loanApplicationNumber = "";
        }
    }*/

    
    /*$sqlP = "SELECT * FROM  cl_loan_table WHERE last_payment <= '0001-01-01' and loan_status = 'Released' ";
    $resultP = $conn->query($sqlP);
    $numRow = mysqli_num_rows($resultP);

    if($resultP->num_rows > 0){
        while ($row = mysqli_fetch_array($resultP)) {
            $loanApplicationNumber = $row['loan_application_number'];
            $monthDate = $row['date_released'];

            echo "$loanApplicationNumber";

            $sql = "UPDATE cl_loan_table SET
            last_payment = '$monthDate'
            WHERE loan_application_number = '$loanApplicationNumber' ";

            if ($conn->query($sql) === TRUE) {
                $infomessage = "Record updated successfully";
                 //echo "$infomessage";
            } 

            else { 
                echo "Error: " . $sql . "<br>" . $conn->error;
            }


        }
    }*/
    
    /*
    */

    /*
    $sql = "UPDATE pl_credit_revenue_table SET
    interest_revenue = '252.28'
    WHERE loan_application_number = 'PL367' and reference_number >= '84227'  and reference_number <= '85763' ";

    if ($conn->query($sql) === TRUE) {
       $infomessage = "Record updated successfully";
       echo "$infomessage";
       $loanApplicationNumberP = "";
       $loanAmountP = 0;
       $paymentTermP = "";
       //$loanStatusP = "";
    } 
    else { 
          echo "Error: " . $sql . "<br>" . $conn->error;
    }*/

    /*
    $sql = "DELETE FROM pl_loan_payment_table
    WHERE loan_application_number = 'PL367' and reference_number >= '85763'  and reference_number <= '86995' ";

    if ($conn->query($sql) === TRUE) {
        $infomessage = "Record updated successfully";
         echo "$infomessage";
    } 

    else { 
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "DELETE FROM pl_credit_revenue_table
    WHERE loan_application_number = 'PL367' and reference_number >= '84025'  and reference_number <= '86995' ";

    if ($conn->query($sql) === TRUE) {
        $infomessage = "Record updated successfully";
         echo "$infomessage";
    } 

    else { 
        echo "Error: " . $sql . "<br>" . $conn->error;
    }*/

    $sql = "UPDATE rice_loan_table SET
    invoice_number = '' 
    WHERE  loan_status = 'void' ";

    if ($conn->query($sql) === TRUE) {
       $infomessage = "Record updated successfully";
    } 
    else { 
          echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>

