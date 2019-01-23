<?php
require('../public/fpdf181/fpdf.php');
require '../models/member.model.php';


$function = ($_GET['method']);
if($function != "memberv"){
	$fpara = ($_GET['mt']);
	$spara = ($_GET['ms']);
	$tpara = ($_GET['mn']);
}

if ($function == "members" or $function == "memberi"){
	echo "<div class='reportheader'>";
	    echo "<table id='memtbl'>
	        <tr>
	            <th style='width:50px;'></th>
	            <th style='width:100px;'>ID #</th>
	            <th style='width:300px;'>Name</th>
	            <th style='width:150px;'>Birth Place</th>
	            <th style='width:150px;'>Birth Date</th>
	            <th style='width:150px;'>TIN #</th>
	            <th style='width:150px;'>SSS #</th>
	            <th style='width:150px;'>Mobile #</th>
	            <th style='width:100px;'>Status</th>
	            <th style='width:100px;'>Modify</th>
	        </tr>
	    </table>";
	echo "</div>";

	$mlist=[];
	$mlistcount=0;
	$mlistcounter=0;
	$minfo=[];
	$mc=0;

	$mlist=getMemberInfo($fpara, $spara, $tpara, "l");
	$mlistcount = count($mlist);

	echo "<div class='reportbody'>";
	    echo "<table id='memtbltb'>";
	    while($mlistcounter<$mlistcount){
	        $minfo=$mlist[$mlistcounter];
	        $mc = $mlistcounter+1;
	        echo "<tr>";
	            echo "<td style='width:50px;'>" . $mc . "</td>";
	            echo "<td style='width:100px;'>" . $minfo[0] . "</td>";
	            echo "<td style='width:300px;'>" . $minfo[4] . ", " . $minfo[2] . " " . $minfo[3] . "</td>";
	            echo "<td style='width:150px;'>" . $minfo[17] . "</td>";
	            echo "<td style='width:150px;'>" . $minfo[18] . "</td>";
	            echo "<td style='width:150px;'>" . $minfo[19] . "</td>";
	            echo "<td style='width:150px;'>" . $minfo[20] . "</td>";
	            echo "<td style='width:150px;'>" . $minfo[10] . "</td>";
	            echo "<td style='width:100px;'>" . $minfo[6] . "</td>";	
	            echo "<td style='width:100px;'>" .  "<button class =". "updatebutton". " " . "id =" . "mu" . " " ."value=" . "$minfo[0]" . " " . "onclick=" . "showmodal(this.value," . "'memberv'" . ")" . " " . ">"  . "UPDATE" . " </button> </td>";
	        echo "</tr>";
	        $mlistcounter++;
	    }
	    echo "</table>";
	echo "</div>";
}

if ($function == "memberl"){
	//FOR PRINT VIEW
	$pdf = new FPDF();
	$pdf->SetFont('Arial','B',9);
	$pdf->AddPage('L','Legal', 0);

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

	$mlist=[];
	$mlistcount=0;
	$mlistcounter=0;
	$minfo=[];
	$mc=0;

	$mlist=getMemberInfo($fpara, $spara, "", "l");
	$mlistcount = count($mlist);

	while($mlistcounter<$mlistcount){
	    $minfo=$mlist[$mlistcounter];
	    $mc = $mlistcounter+1;

	    $pdf->Cell(10,7,"$mc",1);
	    $pdf->Cell(30,7,"$minfo[0]",1);
	    $pdf->Cell(65,7,$minfo[4] . ", " . $minfo[2] . " " .$minfo[3],1);
	    $pdf->Cell(70,7,"$minfo[17]",1);
	    $pdf->Cell(30,7,"$minfo[18]",1);
	    $pdf->Cell(30,7,"$minfo[19]",1);
	    $pdf->Cell(30,7,"$minfo[20]",1);
	    $pdf->Cell(30,7,"$minfo[10]",1);
	    $pdf->Cell(30,7,"$minfo[6]",1);
	    $pdf->Ln();
	    $mlistcounter++;
	}

	$pdf->Output('ll.pdf','F');

	echo "<div>";
	        echo "<iframe src='http://system.local/controllers/ll.pdf' style='width:100%; height:100%;' frameborder='0'></iframe>";
	    echo "</div>";
	echo "</div>";
}

if ($function == "memberv"){
	$hpara = ($_GET['mv']);
	$minfo=[];
	$minfo=getMemberInfo("", "", $hpara, "i");
	$rinfo=[];
	$rinfo=getMemberInfo("", "", $minfo[7], "i");

	$para = "member.controller.php?method='hi' ";

	echo "<div id='modalmi' class='modal'>
	  <div class='modal-content modal-content-common' >
	    <div class='pagetitle'>
	      <span onclick=document.getElementById('modalmi').style.display='none' class='close'>&times;</span>
	      <h1 class='frametext'><span class='frametitle'>Member information</span></h1>
	      <div class='fieldcontainerparent'>
	        <div class='fieldcontainerchild'>
	            <div class='formcontainer'>
	              <h1 class='frametext'><span class='frametitle'>Personal information</span></h1>
	              <label >ID Number</label>
	              <input type='text' id = 'idNumber' value=" . $hpara . " readonly>
	              <label>First Name</label>
	              <input type='text'  placeholder='First name'  id='fname' value=" . $minfo[2] . "  required>
	              <label>Middle Name</label>
	              <input type='text'  placeholder='Middle name' id='mname' value=" . $minfo[3] . " >
	              <label>Last Name</label>
	              <input type='text'  placeholder='Last name' id='lname' value=" . $minfo[4] . " required>
	              <label>Birth place</label>
	              <input type='text' placeholder='Birth place' id='bplace' value=" . $minfo[17] . " required>
	              <label>Birth date</label>
	              <input type='date' placeholder='Birth date' id='bdate' value=" . $minfo[18] . " required><br>
	              <label>Gender</label>
	              <select id='mgen'>
	                <option value='' " . (($minfo[25]=='')?'selected="selected"':"") . ">Select</option>
	                <option value='Male' " . (($minfo[25]=='Male')?'selected="selected"':"") . ">Male</option>
	                <option value='Female' " . (($minfo[25]=='Female')?'selected="selected"':"") . ">Female</option>
	              </select><br>
	              <label>Civil Status</label>
	              <select id='mcst'>
	                <option value='' " . (($minfo[26]=='')?'selected="selected"':"") . ">Select</option>
	                <option value='Single' " . (($minfo[26]=='Single')?'selected="selected"':"") . ">Single</option>
	                <option value='Married' " . (($minfo[26]=='Married')?'selected="selected"':"") . ">Married</option>
	              </select>
	            </div>

	            <div class='formcontainer'>
	              <h1 class='frametext'><span class='frametitle'>Address information</span></h1>
	              <label>Present address</label>
	              <input type='text' placeholder='Present address' id='psaddress' value=" . $minfo[14] . ">
	              <label>Permanent address</label>
	              <input type='text' placeholder='Permanent address' id='pmaddress' value=" . $minfo[15] . ">
	              <label>Provincial address</label>
	              <input type='text' placeholder='Provincial address' id='pvaddress' value=" . $minfo[16] . ">
	            </div>

	            <div class='formcontainer'>
	              <h1 class='frametext'><span class='frametitle'>Contact information</span></h1>
	              <label>Mobile</label>
	              <input type='number' placeholder='Mobile Number' id = 'mobileNumber' value=" . $minfo[10] . " ><br>
	              <label>Email</label>
	              <input type='text' placeholder='Email Address' id = 'emailAddress' value=" . $minfo[11] . ">
	              <label>Emergency contact</label>
	              <input type='text' placeholder='Emergency Contact Name' id = 'emergencyContactName' value=" . $minfo[12] . "><br>
	              <label>Emergency contact #</label>
	              <input type='number' placeholder='Emergency Contact Number' id = 'emergencyContactNumber' value=" . $minfo[13] . ">
	            </div>

	            <div class='formcontainer'>
	              <h1 class='frametext'><span class='frametitle'>Ohter information</span></h1>
	              <label>TIN #</label>
	              <input type='number' placeholder='Tin #' id='tnum' value=" . $minfo[19] . "><br>
	              <label>SSS #</label>
	              <input type='number' placeholder='SSS #' id='snum' value=" . $minfo[20] . "><br>
	              <label>Religion</label>
	              <input type='text' placeholder='Religion' id='rnum' value=" . $minfo[21] . ">
	              <label>Educational attainment</label>
	              <select id='tpres'>
	                <option value='' " . (($minfo[22]=='')?'selected="selected"':"") . ">Select</option>
	                <option value='College' " . (($minfo[22]=='College')?'selected="selected"':"") . ">College</option>
	                <option value='Undergraduate' " . (($minfo[22]=='Undergraduate')?'selected="selected"':"") . ">Undergraduate</option>
	                <option value='Secondary' " . (($minfo[22]=='Secondary')?'selected="selected"':"") . ">Secondary</option>
	                <option value='Primary' " . (($minfo[22]=='Primary')?'selected="selected"':"") . ">Primary</option>
	              </select>
	              <label>Occupation</label>
	              <input type='text' placeholder='Occupation' id='moccup' value=" . $minfo[23] . ">
	              <label>BR #</label>
	              <input type='number' placeholder='BR Number' id='mbrnum' value=" . $minfo[24] . "><br>
	              <label>Date membership</label>
	              <input type='date' id = 'dateMembership' value=" . $minfo[25] . "><br>
	              <label>Member status</label>
	              <select id='membershipStatus' name='membershipStatus' value=''>
	                <option value='' " . (($minfo[6]=='')?'selected="selected"':"") . ">Select</option>
	                <option value='Active' " . (($minfo[6]=='Active')?'selected="selected"':"") . ">Active</option>
	                <option value='Inactive' " . (($minfo[6]=='Inactive')?'selected="selected"':"") . ">Inactive</option>
	                <option value='Diseased' " . (($minfo[6]=='Diseased')?'selected="selected"':"") . ">Diseased</option>
	                <option value='Resigned' " . (($minfo[6]=='Resigned')?'selected="selected"':"") . ">Resigned</option>
	              </select><br>
	              <label>Member type</label>
	              <select id='mtms'>
	                <option value='' " . (($minfo[5]=='')?'selected="selected"':"") . ">Select</option>
	                <option value='Associate' " . (($minfo[5]=='Associate')?'selected="selected"':"") . ">Associate</option>
	                <option value='Regular' " . (($minfo[5]=='Regular')?'selected="selected"':"") . ">Regular</option>
	              </select>
	            </div>


	            <div class='formcontainer'>
	              <h1 class='frametext'><span class='frametitle'>Referral information</span></h1>
	              <label>Membership type</label>
	              <select name='memberOrigin' value=''>
	                <option value='' " . (($minfo[7]=='##')?'selected="selected"':"") . ">Select</option>
	                <option value='Refferal' " . (($minfo[7]!='')?'selected="selected"':"") . ">Refferal</option>
	                <option value='Walk-in'  " . (($minfo[7]=='')?'selected="selected"':"") . ">Walk-in</option>
	              </select>
	              <label>ID number</label>
	              <input type='text' id = 'identifier' value=" . $minfo[7] . ">
	              <label></label>
	              <button id = 'searchMember' class='searchbut'>SEARCH</button>
	              <label>ID number</label>
	              <input type='text'  placeholder='ID NUMBER' readonly id = 'referalIdNumber' value=" . $rinfo[2] . ">
	              <label>First name</label>
	              <input type='text' placeholder='First Name' readonly id = 'firstNameT'>
	              <label>Middle name</label>
	              <input type='text' placeholder='Middle Name' readonly id = 'middleNameT' value=" . $rinfo[3] . ">
	              <label>Last name</label>
	              <input type='text' placeholder='Last Name' readonly id = 'lastNameT' value=" . $rinfo[4] . ">
	            </div>

	            <button 
	            	id = 'submitApplication'  
	            	class='submitbut' onclick=memberupdate(" .
	            	"'member.controller.php?method=memberv&memid=document.getElementById('idNumber').value'"
	            	. ")
	            	>UPDATE
	            </button>

	        </div>
	      </div>
	    </div>
	  </div>
	</div>";
}

?>