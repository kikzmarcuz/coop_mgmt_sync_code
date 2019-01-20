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

	echo "<div id='modalmi' class='modal'>
		<div class='modal-content modal-content-common' >
		    <div class='pagetitle'>
		    <h1 class='frametext'><span class='frametitle'>Member information</span></h1>
		    <div class='fieldcontainerparent'>
		      <div class='fieldcontainerchild'>
		        <form autocomplete='off'>
		          <!--member personal info-->
		          <div class='formcontainer'>
		            <h1 class='frametext'><span class='frametitle'>Personal information</span></h1>
		            <label>First Name</label>
		            <input type='text'  placeholder='First name'  id='fname' required>
		            <label>Middle Name</label>
		            <input type='text'  placeholder='Middle name' id='mname'>
		            <label>Last Name</label>
		            <input type='text'  placeholder='Last name' id='lname' required>
		            <label>Birth place</label>
		            <input type='text' placeholder='Birth place' id='bplace' required>
		            <label>Birth date</label>
		            <input type='date' placeholder='Birth date' id='bdate' required>
		            <div class='radiocontainer'>
		              <h1 class='frametext'><span class='frametitle'>Gender</span></h1>
		              <input type='radio' name='gender' value='Male'>  Male<br>
		              <input type='radio' name='gender' value='Female'>  Female
		            </div>

		            <div class='radiocontainer'>
		              <h1 class='frametext'><span class='frametitle'>Civil status</span></h1>
		              <input type='radio' name='civilStatus' value='Single'>  Single<br>
		              <input type='radio' name='civilStatus' value='Married'>  Married
		            </div>
		          </div>

		          <div class='formcontainer'>
		            <h1 class='frametext'><span class='frametitle'>Address information</span></h1>
		            <label>Present address</label>
		            <input type='text' placeholder='Present address' id='psaddress'>
		            <label>Permanent address</label>
		            <input type='text' placeholder='Permanent address' id='pmaddress'>
		            <label>Provincial address</label>
		            <input type='text' placeholder='Provincial address' id='pvaddress'>
		          </div>

		          <div class='formcontainer'>
		            <h1 class='frametext'><span class='frametitle'>Contact information</span></h1>
		            <label>Mobile</label>
		            <input type='number' placeholder='Mobile Number' id = 'mobileNumber'><br>
		            <label>Email</label>
		            <input type='text' placeholder='Email Address' id = 'emailAddress'>
		            <label>Emergency contact</label>
		            <input type='text' placeholder='Emergency Contact Name' id = 'emergencyContactName'><br>
		            <label>Emergency contact #</label>
		            <input type='number' placeholder='Emergency Contact Number' id = 'emergencyContactNumber'>
		          </div>

		          <div class='formcontainer'>
		            <h1 class='frametext'><span class='frametitle'>Ohter information</span></h1>
		            <label>TIN #</label>
		            <input type='number' placeholder='Tin #' id='tnum'><br>
		            <label>SSS #</label>
		            <input type='number' placeholder='SSS #' id='snum'><br>
		            <label>Religion</label>
		            <input type='text' placeholder='Religion' id='rnum'>
		            <label>Educational attainment</label>
		            <select id='tpres'>
		              <option value=''>Select</option>
		              <option value='College'>College</option>
		              <option value='Undergraduate'>Undergraduate</option>
		              <option value='Secondary'>Secondary</option>
		              <option value='Primary'>Primary</option>
		            </select>
		            <label>Occupation</label>
		            <input type='text' placeholder='Occupation' id='moccup'>
		            <label>BR #</label>
		            <input type='number' placeholder='BR Number' id='mbrnum'><br>
		            <label>Date membership</label>
		            <input type='date' id = 'dateMembership'><br>
		            <label>Membership status</label>
		            <select id='membershipStatus' name='membershipStatus' value=''>
		              <option value=''>Select</option>
		              <option value='Active'>Active</option>
		              <option value='Inactive'>Inactive</option>
		              <option value='Diseased'>Diseased</option>
		              <option value='Resigned'>Resigned</option>
		            </select>
		            <div class='radiocontainer'>
		              <h1 class='frametext'><span class='frametitle'>Membership type</span></h1>
		              <input type='radio' name='typeMembership' value='Regular'>  Regular<br>
		              <input type='radio' name='typeMembership' value='Associate'>  Associate
		            </div>
		          </div>


		          <div class='formcontainer'>
		            <h1 class='frametext'><span class='frametitle'>Referral information</span></h1>
		            <label>Membership type</label>
		            <select name='memberOrigin' value=''>
		              <option value=''>Select</option>
		              <option value='Refferal'>Refferal</option>
		              <option value='Walk-in'>Walk-in</option>
		            </select>
		            <label>ID number</label>
		            <input type='text' id = 'identifier'>
		            <label></label>
		            <button id = 'searchMember' class='searchbut'>SEARCH</button>
		            <label>ID number</label>
		            <input type='text'  placeholder='ID NUMBER' readonly id = 'referalIdNumber'>
		            <label>First name</label>
		            <input type='text' placeholder='First Name' readonly id = 'firstNameT'>
		            <label>Middle name</label>
		            <input type='text' placeholder='Middle Name' readonly id = 'middleNameT'>
		            <label>Last name</label>
		            <input type='text' placeholder='Last Name' readonly id = 'lastNameT'>
		          </div>

		          

		          <button id = 'submitApplication' type='submit' class='submitbut'>SUBMIT</button>
		          <button id = 'submitApplication' type='submit' class='submitbut'>RESET</button>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>
	</div>";
}

?>