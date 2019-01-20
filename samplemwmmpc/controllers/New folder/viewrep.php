<?php

require_once 'dbconnection.php';
require('public/fpdf181/fpdf.php');
require 'memberClass.php';


$fpara = ($_GET['mt']);
$spara = ($_GET['ms']);


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

$mlist=getMemberInfo($fpara, $spara, "", "l", $conn);
$mlistcount = count($mlist);

while($mlistcounter<$mlistcount){
    $minfo=$mlist[$mlistcounter];
    $mc = $mlistcounter+1;

    $pdf->Cell(10,7,"$mc",1);
    $pdf->Cell(30,7,"$minfo[0]",1);
    $pdf->Cell(65,7,$minfo[4] . ", " . $minfo[2] . " " .$minfo[3],1);
    $pdf->Cell(30,7,"$minfo[17]",1);
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
        echo "<iframe src='http://system.local/ll.pdf' style='width:100%; height:100%;' frameborder='0'></iframe>";
    echo "</div>";
echo "</div>";



?>