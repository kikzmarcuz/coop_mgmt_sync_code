<!DOCTYPE html>
<html>

<?php  
require_once 'session.php';
require ("function.php");
//comment
//GOOGLE TEST

$dateTransaction = date('Y-m-d');
$voucherNumber = "";
$orNumber = "";
$typeExpensesC = "";
$categoryExpensesAC = "";
$categoryExpensesFC = "";
$amount = "";
$remarks = "";
$exitB = "";
$countErr = "";
$infomessage = "";

$idNumber = "";
$idNumberSearch = "";
$firstName = "";
$middleName = "";
$lastName = "";

$insertExpenses = "";
$searchIDMember = "";

$exp = 0;
$tdw = 0;
$fdw = 0;
$cbuw = 0;

$expC = "";
$accountEntry = "";

$mChartAccountC = "";
$mainChartAccounts[] = "";
$mainChartAccountsT[] = "";
$mainTitle = "";
$mainCode = "";

$chartAccountC = "";
$chartAccount[] = "";
$chartAccountT[] = "";
$chartTitle = "";
$chartCode = "";

$selectedAccountC = "";
$selectedAccount[] = "";
$selectedAccountT[] = "";
$selectedTitle = "";
$selectedCode = "";

$tdServiceID[] = "";
$tdAmount[] = "";
$tdServiceIDA = "";

$accountTransaction = "";

//Main Chart of Accounts
$sqlbi = "SELECT * FROM  main_chart_account_table order by account_code asc ";
$resultbi = $conn->query($sqlbi);
$numRowMCA =  mysqli_num_rows($resultbi);
$counter = 0;

if($resultbi->num_rows > 0){
    while ($row = mysqli_fetch_array($resultbi)) {
        # code...
        $mainChartAccounts[$counter] = $row['account_code_lc'] . $row['account_code'];
        //$mainChartAccountsL[$counter] = $row['account_code_lc'];
        //$mainChartAccountsC[$counter] = $row['account_code'];
        $mainChartAccountsT[$counter] = $row['account_title'];
        $counter++;
    }
}

//Accounts



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST["insertExpenses"])) {
        $insertExpenses = test_input($_POST["insertExpenses"]);
    }

    if (!empty($_POST["idNumberSearch"])) {
        $idNumberSearch = test_input($_POST["idNumberSearch"]);
    }

    if (!empty($_POST["searchIDMember"])) {
        $searchIDMember = test_input($_POST["searchIDMember"]);
    }

    if (!empty($_POST["exitB"])) {
        $exitB = test_input($_POST["exitB"]);
    }

    if (empty($_POST["dateTransaction"])) {
        $countErr++;
    }else {
        $dateTransaction = test_input($_POST["dateTransaction"]);
    }

    if (empty($_POST["voucherNumber"])) {
        $countErr++;
    }else {
        $voucherNumber = test_input($_POST["voucherNumber"]);
    }

    if (empty($_POST["amount"])) {
        $countErr++;
    }else {
        $amount = test_input($_POST["amount"]);
    }

    if (!empty($_POST["remarks"])) {
        $remarks = test_input($_POST["remarks"]);
    }

    if($exitB == "exitB"){
      session_destroy();
      header("Location: http://localhost/projectkikz/samplemwmmpc/application/views/home/login.php");
    }

    if (!empty($_POST["mChartAccountC"])) {
        $mChartAccountC = test_input($_POST["mChartAccountC"]);
    }

    if (!empty($_POST["chartAccountC"])) {
        $chartAccountC = test_input($_POST["chartAccountC"]);
    }

    if (!empty($_POST["selectedAccountC"])) {
        $selectedAccountC = test_input($_POST["selectedAccountC"]);
    }

    if (!empty($_POST["mainCode"])) {
        $mainCode = test_input($_POST["mainCode"]);

        if(substr($mainCode, 0,2) == "EX"){
          if (empty($_POST["expC"])) {
              $countErr++;
          }else {
              $expC = test_input($_POST["expC"]);
          }
        }
    }

    if (!empty($_POST["mainTitle"])) {
        $mainTitle = test_input($_POST["mainTitle"]);
    }

    if (empty($_POST["selectedCode"])) {
        $countErr++;
    }else {
        $selectedCode = test_input($_POST["selectedCode"]);
    }

    if (!empty($_POST["chartCode"])) {
        $chartCode = test_input($_POST["chartCode"]);

        if(substr($selectedCode, 0,2) == "TD"){
          if (empty($_POST["tdServiceIDA"])) {
              $countErr++;
          }else {
              $tdServiceIDA = test_input($_POST["tdServiceIDA"]);
          }

          if (empty($_POST["idNumber"])) {
              $countErr++;
          }else {
              $idNumber = test_input($_POST["idNumber"]);
          }

          if (empty($_POST["firstName"])) {
              $countErr++;
          }else {
              $firstName = test_input($_POST["firstName"]);
          }

          if (empty($_POST["lastName"])) {
              $countErr++;
          }else {
              $lastName = test_input($_POST["lastName"]);
          }
        }

        if(substr($selectedCode, 0,2) == "CS" or substr($selectedCode, 0,2) == "PS"){
          if (empty($_POST["idNumber"])) {
              $countErr++;
          }else {
              $idNumber = test_input($_POST["idNumber"]);
          }

          if (empty($_POST["firstName"])) {
              $countErr++;
          }else {
              $firstName = test_input($_POST["firstName"]);
          }

          if (empty($_POST["lastName"])) {
              $countErr++;
          }else {
              $lastName = test_input($_POST["lastName"]);
          }
        }

    }

    if (!empty($_POST["chartTitle"])) {
        $chartTitle = test_input($_POST["chartTitle"]);
    }

    if (!empty($_POST["selectedTitle"])) {
        $selectedTitle = test_input($_POST["selectedTitle"]);
    }

    if (empty($_POST["accountEntry"])) {
        $countErr++;
    }else {
        $accountEntry = test_input($_POST["accountEntry"]);
    }

    if (empty($_POST["accountTransaction"])) {
        $countErr++;
    }else {
        $accountTransaction = test_input($_POST["accountTransaction"]);
    }

    $mAccountCode = substr($mChartAccountC, 2,5);
    if($mAccountCode != ""){
        $sqlbi = "SELECT * FROM  chart_accounts WHERE account_category = '$mAccountCode' order by account_code asc ";
        $resultbi = $conn->query($sqlbi);
        $numRowCA =  mysqli_num_rows($resultbi);
        $counter = 0;

        if($resultbi->num_rows > 0){
            while ($row = mysqli_fetch_array($resultbi)) {
                # code...
                $chartAccount[$counter] = $row['account_code_lc'] . $row['account_code'];
                $chartAccountT[$counter] = $row['account_title'];
                $counter++;
            }
        }

        $sqlbi = "SELECT * FROM  main_chart_account_table WHERE account_code = '$mAccountCode' ";
        $resultbi = $conn->query($sqlbi);

        if($resultbi->num_rows > 0){
            while ($row = mysqli_fetch_array($resultbi)) {
                # code...
                $mainTitle = $row['account_title'];
                $mainCode = $row['account_code_lc'] . $row['account_code'];
            }
        }

        $mChartAccountC = "";
        $chartTitle = "";
        $chartCode = "";
        $selectedCode = "";
        $selectedTitle = "";
    }

    $aAccountCode = substr($chartAccountC, 2,5);
    if($aAccountCode != ""){

        $sqlbi = "SELECT * FROM  chart_accounts WHERE account_code = '$aAccountCode' ";
        $resultbi = $conn->query($sqlbi);

        if($resultbi->num_rows > 0){
            while ($row = mysqli_fetch_array($resultbi)) {
                # code...
                $chartTitle = $row['account_title'];
                $chartCode = $row['account_code_lc'] . $row['account_code'];

            }
        }

        $sqlbi = "SELECT * FROM  chart_accounts WHERE account_category = '$aAccountCode' order by account_code asc ";
        $resultbi = $conn->query($sqlbi);
        $numRowC =  mysqli_num_rows($resultbi);
        $counter = 0;

        if($resultbi->num_rows > 0){
            while ($row = mysqli_fetch_array($resultbi)) {
                # code...
                $selectedAccount[$counter] = $row['account_code_lc'] . $row['account_code'];
                $selectedAccountT[$counter] = $row['account_title'];
                $counter++;
            }
        }else{
          $selectedTitle = $chartTitle;
          $selectedCode = $chartCode;
        }

        $chartAccountC = "";
    }

    $sAccountCode = substr($selectedAccountC, 2,5);
    if($sAccountCode != ""){
        $sqlbi = "SELECT * FROM  chart_accounts WHERE account_code = '$sAccountCode' ";
        $resultbi = $conn->query($sqlbi);

        if($resultbi->num_rows > 0){
            while ($row = mysqli_fetch_array($resultbi)) {
                # code...
                $selectedTitle = $row['account_title'];
                $selectedCode = $row['account_code_lc'] . $row['account_code'];
            }
        }

        $selectedAccountC = "";
    }

    if($searchIDMember == "searchIDMember"){
        $memberinfo = seaarchMember($idNumberSearch ,5 ,$conn);
        $idNumber = $memberinfo[0];
        $accountNumber = $memberinfo[1];
        $firstName = $memberinfo[2];
        $middleName = $memberinfo[3];
        $lastName = $memberinfo[4];

        $accode = substr($selectedCode, 0,2);
        if($accode == "TD" or $accode == "FD"){
          $dtable = getDepositTable($accode);

          $tdlistinfo[]="";
          $tdinfo[]="";
          $tdlistinfo = getDepositID($dtable, $idNumber, 5, 1, $conn);
          $limit = count($tdlistinfo);
          $i = 0;

          echo "$limit";

          while($i < $limit){
            $tdinfo=$tdlistinfo[$i];
            $tdServiceID[$i] = $tdinfo[0];
            $tdAmount[$i] = $tdinfo[1];
            $i++;
          }
        }
    }

    if($insertExpenses == "insertExpenses"){
      if($countErr<=0){
        $col = getColumnReportFlag("AC",$conn);
        $rtable = "";

        if($accountTransaction == "CD"){
            $rtable = getTableName($accountTransaction, $conn);
            if(substr($mainCode, 0,2) == "EX"){
                $chartCode = substr($mainCode, 0,2);
                $selectedCode = substr($selectedCode, 0,2);
                $exparr[] = "";

                $exparr[0] = $accountTransaction;
                $exparr[1] = $chartCode;
                $exparr[2] = $selectedCode;
                $exparr[3] = $accountEntry;
                $exparr[4] = $expC;
                $exparr[5] = $amount;
                $exparr[6] = $voucherNumber;
                $exparr[7] = $remarks;
                $exparr[8] = $dateTransaction;
                $exparr[9] = $encodedBy;

                if(postAccountEntryE($exparr, $conn)  == true){
                  $infomessage = "Record updated successfully";
                  $amount = "";
                }else{
                  $infomessage = "Database Error, Check database connection";
                }
            }elseif( (substr($selectedCode, 0,2) == "TD") or (substr($selectedCode, 0,2) == "FD") or (substr($selectedCode, 0,2) == "SD)") or (substr($selectedCode, 0,2) == "PS") or (substr($selectedCode, 0,2) == "CS") ) {
              
              $categoryExpenses = substr($selectedCode, 0,2);

              if($categoryExpenses == "TD" or $categoryExpenses == "FD"){
                  $deparr[0] = $voucherNumber;
                  $deparr[1] = $amount;
                  $deparr[2] = $dateTransaction;
                  $deparr[3] = $encodedBy;
                  $dtable = getDepositTable($categoryExpenses);

                  if(updateDeposit($dtable, $deparr, $idNumber, $tdServiceIDA, $conn) == true){
                    $infomessage = "Record updated successfully";
                    $selectedCode = $idNumber;
                  }else{
                    $infomessage = "Database Error, Check database connection";
                  }
              }elseif ($categoryExpenses == "CS" or $categoryExpenses == "PS") {
                  $scarr[0] = $idNumber;
                  $scarr[1] = "Withdraw";
                  $scarr[2] = $voucherNumber;
                  $scarr[3] = $amount;
                  $scarr[4] = $dateTransaction;
                  $scarr[5] = $encodedBy;

                  if(postShareCapital($scarr, $conn) == true){
                    $infomessage = "Record updated successfully";
                    $selectedCode = $idNumber;
                  }else{
                    $infomessage = "Database Error, Check database connection";
                  }
              }
            }else{
                $chartCode = substr($mainCode, 0,2);
                $selectedCode = substr($selectedCode, 0,2);
                $commonarr[] = "";

                $commonarr[0] = $accountTransaction;
                $commonarr[1] = $chartCode;
                $commonarr[2] = $selectedCode;
                $commonarr[3] = $accountEntry;
                $commonarr[4] = $amount;
                $commonarr[5] = $voucherNumber;
                $commonarr[6] = $remarks;
                $commonarr[7] = $dateTransaction;
                $commonarr[8] = $encodedBy;

                if(postAccountEntry($commonarr, $conn)  == true){
                  $infomessage = "Record updated successfully";
                  $amount = "";
                }else{
                  $infomessage = "Database Error, Check database connection";
                }
            }
        }else{
            $rtable = getTableName($accountTransaction, $conn);
            $chartCode = substr($mainCode, 0,2);
            $selectedCode = substr($selectedCode, 0,2);
            $commonarr[] = "";

            $commonarr[0] = $accountTransaction;
            $commonarr[1] = $chartCode;
            $commonarr[2] = $selectedCode;
            $commonarr[3] = $accountEntry;
            $commonarr[4] = $amount;
            $commonarr[5] = $voucherNumber;
            $commonarr[6] = $remarks;
            $commonarr[7] = $dateTransaction;
            $commonarr[8] = $encodedBy;

            if(postAccountEntry($commonarr, $conn)  == true){
              $infomessage = "Record updated successfully";
              $amount = "";
            }else{
              $infomessage = "Database Error, Check database connection";
            }
        }

        //post report
        $reparr[]="";
        $reparr[0]=$selectedCode;
        $reparr[1]=$voucherNumber;
        $reparr[2]=$dateTransaction;
        $reparr[3]=$encodedBy;

        echo "$col";
        //reference_number
        postTransactionReport($rtable, $reparr, $conn);
        $status = updateTransactionReport($rtable, $selectedCode, $voucherNumber, $col, $conn);
        
        if($status == true){
            $infomessage = "Record updated successfully";
            $voucherNumber = "";
            $chartCode = "";
            $chartTitle = "";
            $mainCode = "";
            $mainTitle = "";
            $selectedCode = "";
            $selectedTitle = "";
            $accountEntry = "";
            $expC = "";

            $idNumber = "";
            $tdServiceIDA = "";

            $amount = "";
        }else{
            $infomessage = "Database Error, Check database connection";
        }
      }else{
        $infomessage = "Fill-Up Empty Fields";
      }
    }
}

?>

<head>
    <?php include "css.html" ?>
    <title>Disbursement</title>
</head>


<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div>
            <?php //include 'topbar.php';?>
            <!--member account info-->
            <div class="row" >
                <?php include 'navigation.php';?>
                <div class="col-sm-12" style="margin-top:70px;margin-left: 16.7%;margin-bottom: 200px;">  
                    <p align="center"><span style="color: red"><?php echo $infomessage;?></span><br></p>
                    <div class="row">
                    
                        <div class="col-lg-2.5" style="background-color:#fff; padding: 5px; margin: 5px">
                            <h6>Disbursement</h6>


                            <label style="width: 200px">Transaction</label>
                            <select style="width: 200px" name="accountTransaction" value="<?php echo $accountTransaction;?>">
                              <option value="" <?php if($accountTransaction == "") echo "selected"; ?>>Select</option>
                              <option value="CR" <?php if($accountTransaction == "CR") echo "selected"; ?>>Cash Registry</option>
                              <option value="CD" <?php if($accountTransaction == "CD") echo "selected"; ?>>Cash Disbursement</option>
                              <option value="JE" <?php if($accountTransaction == "JE") echo "selected"; ?>>Journal Entry</option>
                            </select>
                            <br>

                            <label style="width: 200px">Date</label>
                            <input style="width: 200px" type="date" value = "<?php echo $dateTransaction;?>" name = "dateTransaction"><br>

                            <label style="width: 200px">Main Account</label>
                            <input style="width: 200px" type="text" onchange ="this.form.submit()" list = "mChartAccounts" value = "<?php echo $mChartAccountC;?>" id = "input" name="mChartAccountC" autocomplete="off">
                            <input style="width: 150px" type="text" placeholder="Main Account Code" value = "<?php echo $mainCode;?>" name = "mainCode" readonly>
                            <input style="width: 350px" type="text" placeholder="Main Account Title" value = "<?php echo $mainTitle;?>" name = "mainTitle" readonly><br>
                            <datalist id = "mChartAccounts">
                               <?php 
                                  $counterh = 0;
                                  while($counterh < $numRowMCA) {
                                      echo "<option value=" . $mainChartAccounts[$counterh] . ">" .  $mainChartAccountsT[$counterh] . "</option>" ;
                                      $counterh ++;
                                  }

                              ?>
                            </datalist>

                            <label style="width: 200px">Account Category</label>
                            <input style="width: 200px" type="text" onchange ="this.form.submit()" list = "chartAccount" value = "<?php echo $chartAccountC;?>" id = "input" name="chartAccountC" autocomplete="off">
                            <input style="width: 150px" type="text" placeholder="Category Code" value = "<?php echo $chartCode;?>" name = "chartCode" readonly>
                            <input style="width: 350px" type="text" placeholder="Category Title" value = "<?php echo strtoupper($chartTitle);?>" name = "chartTitle" readonly><br>

                            <datalist id = "chartAccount">
                               <?php 
                                  $counterh = 0;
                                  while($counterh < $numRowCA) {
                                      echo "<option value=" . $chartAccount[$counterh] . ">" .  $chartAccountT[$counterh] . "</option>" ;
                                      $counterh ++;
                                  }

                              ?>
                            </datalist>


                            <label style="width: 200px">Selected Account</label>
                            <input style="width: 200px" type="text" onchange ="this.form.submit()" list = "selectedAccount" value = "<?php echo $selectedAccountC;?>" id = "input" name="selectedAccountC" autocomplete="off">
                            <input style="width: 150px" type="text" placeholder="Selected Code" value = "<?php echo $selectedCode;?>" name = "selectedCode" readonly>
                            <input style="width: 350px" type="text" placeholder="Account Title" value = "<?php echo $selectedTitle;?>" name = "selectedTitle" readonly><br>
                            <datalist id = "selectedAccount">
                               <?php 
                                  $counterh = 0;
                                  while($counterh < $numRowC) {
                                      echo "<option value=" . $selectedAccount[$counterh] . ">" .  $selectedAccountT[$counterh] . "</option>" ;
                                      $counterh ++;
                                  }

                              ?>
                            </datalist>


                            <div class= "<?php if($accountTransaction == "CD"){echo "inline";}else{echo "none";}?>">
                              <label style="width: 200px">Voucher #</label>
                            </div>
                            <div class= "<?php if($accountTransaction == "CR"){echo "inline";}else{echo "none";}?>">
                              <label style="width: 200px">OR #</label>
                            </div>
                            <div class= "<?php if($accountTransaction == "JE"){echo "inline";}else{echo "none";}?>">
                              <label style="width: 200px">Journal #</label>
                            </div>

                            <div class= "<?php if($accountTransaction == ""){echo "inline";}else{echo "none";}?>">
                              <label style="width: 200px">Reference #</label>
                            </div>

                            <input style="width: 200px" type="text" value = "<?php echo $voucherNumber;?>" name = "voucherNumber" autocomplete="off"><br>

                            <label style="width: 200px">Account Entry</label>
                            <select style="width: 200px" name="accountEntry" value="<?php echo $accountEntry;?>">
                              <option value="" <?php if($accountEntry == "") echo "selected"; ?>>Select</option>
                              <option value="cr" <?php if($accountEntry == "cr") echo "selected"; ?>>Credit</option>
                              <option value="dr" <?php if($accountEntry == "dr") echo "selected"; ?>>Debit</option>
                            </select>
                            <br>

                            <!-- Show if Expense -->
                            <div class= "<?php if(substr($mainCode, 0 ,2) == "EX"){echo "inline";}else{echo "none";}?>">
                              <label style="width: 200px">Account Expense</label>
                              <select style="width: 200px" name="expC" value="<?php echo $expC;?>">
                                <option value="" <?php if($expC == "") echo "selected"; ?>>Select</option>
                                <option value="td" <?php if($expC == "td") echo "selected"; ?>>Trading</option>
                                <option value="ld" <?php if($expC == "ld") echo "selected"; ?>>Lending</option>
                              </select>
                              <br>
                            </div>

                            <label style="width: 200px">Amount</label>
                            <input style="width: 200px" type="text" value = "<?php echo $amount;?>" name = "amount" autocomplete="off"><br>

                            <label style="width: 200px">Remarks</label>
                            <textarea style="width: 350px;height: 150px;" value = "<?php echo $remarks;?>" name = "remarks"></textarea><br><br>

                            <button class="btn btn-outline-success my-2 my-sm-0" name = "insertExpenses" value = "insertExpenses" type="submit" style="align-self: center;">POST</button>
                        </div>

                        <div class= "<?php if(substr($selectedCode, 0 ,2) == "TD" or substr($selectedCode, 0 ,2) == "FD" or substr($selectedCode, 0 ,2) == "PS" or substr($selectedCode, 0 ,2) == "CS"){echo "inline";}else{echo "none";}?>">
                          <div id = "sm" class="col-lg-2.5" style="background-color:#fff; padding: 5px; margin: 5px;">
                              <h6>Search Member</h6>
                              <h7 style = "color: red" >***Note: Withdrawal of deposits puroposes only</h7>

                              <div class="form-group">
                                  <div class="col-md-10">
                                      <input type="text" class="form-control" placeholder = "Search" value = "<?php echo $idNumberSearch;?>" name = "idNumberSearch">
                                  </div>
                                  <br>
                                  <div class="col-sm-10">
                                        <button onclick="onInput()" class="btn btn-outline-success my-2 my-sm-0" id = "search" name = "searchIDMember" value = "searchIDMember" type="submit">Search</button>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class= "<?php if(substr($selectedCode, 0 ,2) == "TD" or substr($selectedCode, 0 ,2) == "FD"){echo "inline";}else{echo "none";}?>">
                                    <label style="width: 200px">Time Deposit Service ID</label><br>
                                    <select style="width: 200px;border: none;border-bottom: 2px solid red;font-size: 20px;" name="tdServiceIDA" value="<?php echo $tdServiceIDA;?>">
                                      <option value="" <?php if($tdServiceIDA == "") echo "selected"; ?>>Select</option>
                                      <?php 
                                          $counterh = 0;
                                          while($counterh < $limit) {
                                              echo "<option value=". $tdServiceID[$counterh] . ">"  . "$tdServiceID[$counterh]" . " </option> ";
                                              $counterh ++;
                                          }

                                      ?>
                                    </select>
                                </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-md-10">
                                      <input type="text" class="form-control" placeholder="ID Number" value = "<?php echo $idNumber;?>" name = "idNumber" readonly>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <div class="col-md-10">
                                      <input type="text" class="form-control" placeholder="First Name" value = "<?php echo $firstName;?>" name = "firstName" readonly>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-10">
                                      <input type="text" class="form-control" placeholder="Middle Name" value = "<?php echo $middleName;?>" name = "middleName" readonly>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-md-10">
                                      <input type="text" class="form-control" placeholder="Last Name" value = "<?php echo $lastName;?>" name = "lastName" readonly>
                                  </div>
                              </div>
                          </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
  function onInput() {
    
    var val = document.getElementById("input").value;
    var opts = document.getElementById('typeExpenses').childNodes;
    for (var i = 0; i < opts.length; i++) {
      if (opts[i].value === val) {
        // An item was selected from the list!
        // yourCallbackHere()
        if(opts[i].value == val){
          if(opts[i].value == "AC Administrative Cost"){
            document.getElementById("ACF").style.display = 'block';
            document.getElementById("FCF").style.display = 'none';
            document.getElementById("AT").style.display = 'none';
            document.getElementById("LB").style.display = 'none';
            document.getElementById("OX").style.display = 'none';
            document.getElementById("SF").style.display = 'none';
            document.getElementById("sm").style.display = 'none';
          }else if(opts[i].value == "FC Financing Cost"){
            document.getElementById("ACF").style.display = 'none';
            document.getElementById("FCF").style.display = 'block';
            document.getElementById("AT").style.display = 'none';
            document.getElementById("LB").style.display = 'none';
            document.getElementById("sm").style.display = 'none';
            document.getElementById("SF").style.display = 'none';
            document.getElementById("OX").style.display = 'none';
          }else if(opts[i].value == "AT Asset"){
            document.getElementById("ACF").style.display = 'none';
            document.getElementById("FCF").style.display = 'none';
            document.getElementById("AT").style.display = 'block';
            document.getElementById("LB").style.display = 'none';
            document.getElementById("OX").style.display = 'none';
            document.getElementById("SF").style.display = 'none';
          }else if(opts[i].value == "LB Liabilities"){
            document.getElementById("ACF").style.display = 'none';
            document.getElementById("FCF").style.display = 'none';
            document.getElementById("AT").style.display = 'none';
            document.getElementById("LB").style.display = 'block';
            document.getElementById("OX").style.display = 'none';
            document.getElementById("SF").style.display = 'none';
          }else if(opts[i].value == "SF Statutory Funds"){
            document.getElementById("ACF").style.display = 'none';
            document.getElementById("FCF").style.display = 'none';
            document.getElementById("AT").style.display = 'none';
            document.getElementById("LB").style.display = 'none';
            document.getElementById("OX").style.display = 'none';
            document.getElementById("SF").style.display = 'block';
          }else{
            document.getElementById("ACF").style.display = 'none';
            document.getElementById("FCF").style.display = 'none';
            document.getElementById("AT").style.display = 'none';
            document.getElementById("LB").style.display = 'none';
            document.getElementById("OX").style.display = 'block';
            document.getElementById("SF").style.display = 'none';
          }
        }
        //alert(opts[i].value);
        break;
      }
    }
  }
</script>

</body>
    <?php include "css1.html" ?>
</html>