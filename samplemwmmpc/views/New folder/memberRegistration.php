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
    <div class="pagetitle">
      <h1 class="frametext"><span class="frametitle">Member information</span></h1>
      <div class="fieldcontainerparent">
        <div class="fieldcontainerchild">
          <form autocomplete="off">
            <!--member personal info-->
            <div class="formcontainer">
              <h1 class="frametext"><span class="frametitle">Personal information</span></h1>
              <label>First Name</label>
              <input type="text"  placeholder="First name"  id="fname" required>
              <label>Middle Name</label>
              <input type="text"  placeholder="Middle name" id="mname">
              <label>Last Name</label>
              <input type="text"  placeholder="Last name" id="lname" required>
              <label>Birth place</label>
              <input type="text" placeholder="Birth place" id="bplace" required>
              <label>Birth date</label>
              <input type="date" placeholder="Birth date" id="bdate" required>
              <div class="radiocontainer">
                <h1 class="frametext"><span class="frametitle">Gender</span></h1>
                <input type="radio" name="gender" value="Male">  Male<br>
                <input type="radio" name="gender" value="Female">  Female
              </div>

              <div class="radiocontainer">
                <h1 class="frametext"><span class="frametitle">Civil status</span></h1>
                <input type="radio" name="civilStatus" value="Single">  Single<br>
                <input type="radio" name="civilStatus" value="Married">  Married
              </div>
            </div>

            <div class="formcontainer">
              <h1 class="frametext"><span class="frametitle">Address information</span></h1>
              <label>Present address</label>
              <input type="text" placeholder="Present address" id="psaddress">
              <label>Permanent address</label>
              <input type="text" placeholder="Permanent address" id="pmaddress">
              <label>Provincial address</label>
              <input type="text" placeholder="Provincial address" id="pvaddress">
            </div>

            <div class="formcontainer">
              <h1 class="frametext"><span class="frametitle">Contact information</span></h1>
              <label>Mobile</label>
              <input type="number" placeholder="Mobile Number" id = "mobileNumber"><br>
              <label>Email</label>
              <input type="text" placeholder="Email Address" id = "emailAddress">
              <label>Emergency contact</label>
              <input type="text" placeholder="Emergency Contact Name" id = "emergencyContactName"><br>
              <label>Emergency contact #</label>
              <input type="number" placeholder="Emergency Contact Number" id = "emergencyContactNumber">
            </div>

            <div class="formcontainer">
              <h1 class="frametext"><span class="frametitle">Ohter information</span></h1>
              <label>TIN #</label>
              <input type="number" placeholder="Tin #" id="tnum"><br>
              <label>SSS #</label>
              <input type="number" placeholder="SSS #" id="snum"><br>
              <label>Religion</label>
              <input type="text" placeholder="Religion" id="rnum">
              <label>Educational attainment</label>
              <select id="tpres">
                <option value="">Select</option>
                <option value="College">College</option>
                <option value="Undergraduate">Undergraduate</option>
                <option value="Secondary">Secondary</option>
                <option value="Primary">Primary</option>
              </select>
              <label>Occupation</label>
              <input type="text" placeholder="Occupation" id="moccup">
              <label>BR #</label>
              <input type="number" placeholder="BR Number" id="mbrnum"><br>
              <label>Date membership</label>
              <input type="date" id = "dateMembership"><br>
              <label>Membership status</label>
              <select id="membershipStatus" name="membershipStatus" value="">
                <option value="">Select</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Diseased">Diseased</option>
                <option value="Resigned">Resigned</option>
              </select>
              <div class="radiocontainer">
                <h1 class="frametext"><span class="frametitle">Membership type</span></h1>
                <input type="radio" name="typeMembership" value="Regular">  Regular<br>
                <input type="radio" name="typeMembership" value="Associate">  Associate
              </div>
            </div>


            <div class="formcontainer">
              <h1 class="frametext"><span class="frametitle">Referral information</span></h1>
              <label>Membership type</label>
              <select name="memberOrigin" value="">
                <option value="">Select</option>
                <option value="Refferal">Refferal</option>
                <option value="Walk-in">Walk-in</option>
              </select>
              <label>ID number</label>
              <input type="text" id = "identifier">
              <label></label>
              <button id = "searchMember" class="searchbut">SEARCH</button>
              <label>ID number</label>
              <input type="text"  placeholder="ID NUMBER" readonly id = "referalIdNumber">
              <label>First name</label>
              <input type="text" placeholder="First Name" readonly id = "firstNameT">
              <label>Middle name</label>
              <input type="text" placeholder="Middle Name" readonly id = "middleNameT">
              <label>Last name</label>
              <input type="text" placeholder="Last Name" readonly id = "lastNameT">
            </div>

            

            <button id = "submitApplication" type="submit" class="submitbut">SUBMIT</button>
            <button id = "submitApplication" type="submit" class="submitbut">RESET</button>
          </form>
        </div>
      </div>
    </div>
</div>

