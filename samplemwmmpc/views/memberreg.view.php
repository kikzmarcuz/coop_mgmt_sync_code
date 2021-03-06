<div class="pagenavbar">
  <h5 class="titlepage">Registration form</h5>
</div>
  
<div id="pagetoolbar" class="pagetoolbar">
    <button onclick="getlistmember('memberl')">SAVE</button>
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
              <label >ID Number</label>
              <input type="text"  value = "<?php echo $idNumberF;?>" name = "idNumberF" readonly>
              <label>First Name</label>
              <input type="text"  placeholder="First name"  id="fname" required>
              <label>Middle Name</label>
              <input type="text"  placeholder="Middle name" id="mname">
              <label>Last Name</label>
              <input type="text"  placeholder="Last name" id="lname" required>
              <label>Birth place</label>
              <input type="text" placeholder="Birth place" id="bplace" required>
              <label>Birth date</label>
              <input type="date" placeholder="Birth date" id="bdate" required><br>
              <label>Gender</label>
              <select id='mgen'>
                  <option value=''>Select</option>
                  <option value='Male'>Male</option>
                  <option value='Female'>Female</option>
                </select><br>
                <label>Civil Status</label>
                <select id='mcst'>
                  <option value=''>Select</option>
                  <option value='Single'>Single</option>
                  <option value='Married'>Married</option>
                </select>
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
              <label>Member status</label>
              <select id="membershipStatus" name="membershipStatus" value="">
                <option value="">Select</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                <option value="Diseased">Diseased</option>
                <option value="Resigned">Resigned</option>
              </select><br>
              <label>Member type</label>
              <select id='mtms'>
                  <option value=''>Select</option>
                  <option value='Associate'>Associate</option>
                  <option value='Regular'>Regular</option>
                </select>
            </div>


            <div class="formcontainer">
              <h1 class="frametext"><span class="frametitle">Referral information</span></h1>
              <label>Membership type</label>
              <select name="memberOrigin" value="">
                <option value="">Select</option>
                <option value="Refferal">Refferal</option>
                <option value="Walk-in">Walk-in</option>
              </select>
              <label>Search</label>
              <input type="text" id = "identifier">
              <label>ID number</label>
              <input type="text"  placeholder="ID NUMBER" readonly id = "referalIdNumber">
              <label>First name</label>
              <input type="text" placeholder="First Name" readonly id = "firstNameT">
              <label>Middle name</label>
              <input type="text" placeholder="Middle Name" readonly id = "middleNameT">
              <label>Last name</label>
              <input type="text" placeholder="Last Name" readonly id = "lastNameT">
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

