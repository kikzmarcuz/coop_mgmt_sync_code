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
?>

<div class="pagenavbar">
  <h5 class="titlepage">Registration form</h5>
</div>
  
<div class="pagetoolbar">
    <label >ID Number</label>
    <input type="text"  value = "<?php echo $idNumberF;?>" name = "idNumberF" readonly>
    <input type="text"  value = "<?php echo $accountNumber;?>" readonly="" name = "accountNumber">
</div>

<!--member account info-->
<div class="pagearea">
    <div class="fieldcontainer">
      <!--member personal info-->
      <div>
        <label>First Name</label>
        <input type="text"  placeholder="First Name" value = "<?php echo $firstName;?>" name = "firstName"><br>
        <label>First Name</label>
        <input type="text"  placeholder="Middle Name" value = "<?php echo $middleName;?>" name = "middleName"><br>
        <label>First Name</label>
        <input type="text"  placeholder="Last Name" value = "<?php echo $lastName;?>" name = "lastName"><br>
      </div>
      <!--member address info-->

      <div>
        <input type="text"  name="presentAddress" placeholder="Present Address" value = "<?php echo $presentAddress;?>">
        <input type="text"  name="permanentAddress" placeholder="Permanent Address" value = "<?php echo $permanentAddress;?>">
        <input type="text"  name ="provincialAddress" placeholder="Provincial Address" value = "<?php echo $provincialAddress;?>">
      </div>

      <div>
        <input type="text" placeholder="Birth Place" value = "<?php echo $birthPlace;?>" name = "birthPlace">
        <input type="date" placeholder="Birth Date" value = "<?php echo $birthDate;?>" name = "birthDate">
        <input type="number" placeholder="Tin No." value = "<?php echo $tinNumber;?>" name = "tinNumber">
        <input type="number" placeholder="SSS No." value = "<?php echo $sssNumber;?>" name = "sssNumber">
        <input type="text" placeholder="Religion" value = "<?php echo $religion;?>" name = "religion">
        <select id="tpres" name="educationalAttainment" value="<?php echo $educationalAttainment;?>">
          <option value="" <?php if($educationalAttainment == "") echo "selected"; ?>>Select</option>
          <option value="College" <?php if($educationalAttainment == "College") echo "selected"; ?>>College</option>
          <option value="Undergraduate" <?php if($educationalAttainment == "Undergraduate") echo "selected"; ?>>Undergraduate</option>
          <option value="Secondary" <?php if($educationalAttainment == "Secondary") echo "selected"; ?>>Secondary</option>
          <option value="Primary" <?php if($educationalAttainment == "Primary") echo "selected"; ?>>Primary</option>
        </select>
        <input type="text" placeholder="Occupation" value = "<?php echo $occupation;?>" name = "occupation">
        <input type="number" placeholder="BR Number" value = "<?php echo $brNumber;?>" name = "brNumber">
      </div>

      <div>
        <label class="control-label">Gender</label>
        <br>
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="Male") echo "checked";?>
        value="Male">Male
        <input type="radio" name="gender"
        <?php if (isset($gender) && $gender=="Female") echo "checked";?>
        value="Female">Female 
      </div>

      <div>
        <label class="control-label">Civil Status</label>
        <br>
        <input type="radio" name="civilStatus" 
        <?php if (isset($civilStatus) && $civilStatus=="Single") echo "checked";?>
        value="Single">Single
        <input type="radio" name="civilStatus"
        <?php if (isset($civilStatus) && $civilStatus=="Married") echo "checked";?> 
        value="Married">Married
      </div>

      <div>
        <label>Type 0f Membership</label>
        <br>
        <input type="radio" name="typeMembership" 
        <?php if (isset($typeMembership) && $typeMembership=="Regular") echo "checked";?>
        value="Regular">Regular
        <input type="radio" name="typeMembership"
        <?php if (isset($typeMembership) && $typeMembership=="Associate") echo "checked";?> 
        value="Associate">Associate
      </div>

      <div>
        <input type="number" placeholder="Mobile Number" value = "<?php echo $mobileNumber;?>" name = "mobileNumber">
        <input type="text" placeholder="Email Address" value = "<?php echo $emailAddress;?>" name = "emailAddress">
        <input type="text" placeholder="Emergency Contact Name" value = "<?php echo $emergencyContactName;?>" name = "emergencyContactName">
        <input type="number" placeholder="Emergency Contact Number" value = "<?php echo $emergencyContactNumber;?>" name = "emergencyContactNumber">
      </div>

      <div>
        <input type="date" value = "<?php echo $dateMembership;?>" name = "dateMembership">
        <select id="membershipStatus" name="membershipStatus" value="<?php echo $membershipStatus;?>">
          <option value="" <?php if($membershipStatus == "") echo "selected"; ?>>Select</option>
          <option value="Active" <?php if($membershipStatus == "Active") echo "selected"; ?>>Active</option>
          <option value="Inactive" <?php if($membershipStatus == "Inactive") echo "selected"; ?>>Inactive</option>
          <option value="Diseased" <?php if($membershipStatus == "Diseased") echo "selected"; ?>>Diseased</option>
          <option value="Resigned" <?php if($membershipStatus == "Resigned") echo "selected"; ?>>Resigned</option>
        </select>
        <select id="memberOrigin" name="memberOrigin" value="<?php echo $memberOrigin;?>">
          <option value="" <?php if($memberOrigin == "") echo "selected"; ?>>Select</option>
          <option value="Refferal" <?php if($memberOrigin == "Refferal") echo "selected"; ?>>Refferal</option>
          <option value="Walk-in" <?php if($memberOrigin == "Walk-in") echo "selected"; ?>>Walk-in</option>
        </select>
        <input type="search" id = "identifier" name="identifier" value = "<?php echo $identifier;?>">
        <button id = "search" name = "searchMember" value = "searchMember" type="submit">SEARCH</button>
        <input type="text"  placeholder="ID NUMBER" readonly="" value = "<?php echo $referalIdNumber;?>" name = "referalIdNumber">
        <input type="text" placeholder="First Name" readonly="" value = "<?php echo $firstNameT;?>" name = "firstNameT">
        <input type="text" placeholder="Middle Name" readonly="" value = "<?php echo $middleNameT;?>" name = "middleNameT">
        <input type="text" placeholder="Last Name" readonly="" value = "<?php echo $lastNameT;?>" name = "lastNameT">
      </div>


      <button type="submit" name = "submitApplication" value = "submitApplication" style="align-self: center;">REGISTER</button>
    </div>
</div>

