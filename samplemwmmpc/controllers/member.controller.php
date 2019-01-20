<?php
require('../public/fpdf181/fpdf.php');
require '../models/member.model.php';


$fpara = ($_GET['mt']);
$spara = ($_GET['ms']);
$function = ($_GET['method']);

if ($function == "members"){
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

	$mlist=getMemberInfo($fpara, $spara, "", "l");
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
	            echo "<td style='width:100px;'>" . "" . "</td>";
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

?>