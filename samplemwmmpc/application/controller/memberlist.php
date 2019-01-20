<?php

require_once 'dbconnection.php';
require('public/fpdf181/fpdf.php');
require 'memberClass.php';


$fpara = ($_GET['mt']);
$spara = ($_GET['ms']);

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

$mlist=getMemberInfo($fpara, $spara, "", "l", $conn);
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

?>