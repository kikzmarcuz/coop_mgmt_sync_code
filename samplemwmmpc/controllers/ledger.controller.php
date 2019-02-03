<?php
require('../public/fpdf181/fpdf.php');
require '../models/ledger.model.php';

$function = ($_GET['method']);

if ($function == "sd"){
	$para = ($_GET['sm']);
	$sdinfo=[];
	$sdinfol=[];
	$sdbal = 0;
	
	echo "<div class='reportheader'>";
	    echo "<table id='memtbl'>
	        <tr>
	            <th style='width:100px;'>Transaction</th>
	            <th style='width:100px;'>Refernce #</th>
	            <th style='width:100px;'>Date</th>
	            <th style='width:100px;'>Deposit</th>
	            <th style='width:100px;'>Witdraw</th>
	            <th style='width:100px;'>Retention</th>
	            <th style='width:100px;'>Interest</th>
	            <th style='width:100px;'>Balance</th>
	        </tr>
	    </table>";
	echo "</div>";

	$sdbal=getSDBal($para);
	$sdinfol=getSDData($para, "l");
	$sdcount=count($sdinfol);
	$sdcounter=0;

	echo "<div class='reportbodyparent'>
	<div class='reportbodychild'>";
		echo "<table id='memtbltb'>";
    	$actualBalance = 0;
    		 echo "<tr>";
    		 	echo "<td style='color:#F0E68C;width:100px;'>" . "BALANCE" . "</td>";
    		 	echo "<td style='color:#F0E68C;width:100px;'>" . $sdbal . "</td>";
    		 echo "</tr>";
	    while($sdcounter < $sdcount){
	    	$sdinfo = $sdinfol[$sdcounter];
	        echo "<tr>";
	            echo "<td style='width:100px;'>" . $sdinfo[0] . "</td>";
	            if($sdinfo[4] != ""){
	            	echo "<td style='width:100px;'>" . $sdinfo[4] . "</td>";
	            }else if($sdinfo[5] != ""){
	            	echo "<td style='width:100px;'>" . $sdinfo[5] . "</td>";
	            }
	            echo "<td style='width:100px;'>" . $sdinfo[8] . "</td>";

	            if($sdinfo[2] == "Deposit"){
	            	$actualBalance = $actualBalance + $sdinfo[6];
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . number_format($sdinfo[6],'2','.',',') . "</td>";
	            }else{
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . "-" . "</td>";
	            }

	            if($sdinfo[2] == "Withdraw"){
	            	$actualBalance = $actualBalance - $sdinfo[6];
	            	echo "<td " . "style=" . "color:orange;width:100px;" . ">" . number_format($sdinfo[6],'2','.',',') . "</td>";
	            }else{
	            	echo "<td " . "style=" . "color:orange;width:100px;" . ">" . "-" . "</td>";
	            }  

	            if($sdinfo[2] == "Retention"){
	            	$actualBalance = $actualBalance + $sdinfo[6];
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . number_format($sdinfo[6],'2','.',',') . "</td>";
	            }else{
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . "-" . "</td>";
	            }

	            if($sdinfo[2] == "Interest"){
	            	$actualBalance = $actualBalance + $sdinfo[6];
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . number_format($sdinfo[6],'2','.',',') . "</td>";
	            }else{
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . "-" . "</td>";
	            }
	            echo "<td " . "style=" . "color:#42FF33;width:100px;" . ">" . number_format($actualBalance,'2','.',',') . "</td>";
	        echo "</tr>";
	        $sdcounter ++;
	    }
	echo "</div>
	</div";
}

if ($function == "sd"){
	$para = ($_GET['sm']);
	$sdinfo=[];
	$sdinfol=[];
	$sdbal = 0;
	
	echo "<div class='reportheader'>";
	    echo "<table id='memtbl'>
	        <tr>
	            <th style='width:100px;'>Transaction</th>
	            <th style='width:100px;'>Refernce #</th>
	            <th style='width:100px;'>Date</th>
	            <th style='width:100px;'>Deposit</th>
	            <th style='width:100px;'>Witdraw</th>
	            <th style='width:100px;'>Retention</th>
	            <th style='width:100px;'>Interest</th>
	            <th style='width:100px;'>Balance</th>
	        </tr>
	    </table>";
	echo "</div>";

	$sdbal=getSDBal($para);
	$sdinfol=getSDData($para, "l");
	$sdcount=count($sdinfol);
	$sdcounter=0;

	echo "<div class='reportbodyparent'>
	<div class='reportbodychild'>";
		echo "<table id='memtbltb'>";
    	$actualBalance = 0;
    		 echo "<tr>";
    		 	echo "<td style='color:#F0E68C;width:100px;'>" . "BALANCE" . "</td>";
    		 	echo "<td style='color:#F0E68C;width:100px;'>" . $sdbal . "</td>";
    		 echo "</tr>";
	    while($sdcounter < $sdcount){
	    	$sdinfo = $sdinfol[$sdcounter];
	        echo "<tr>";
	            echo "<td style='width:100px;'>" . $sdinfo[0] . "</td>";
	            if($sdinfo[4] != ""){
	            	echo "<td style='width:100px;'>" . $sdinfo[4] . "</td>";
	            }else if($sdinfo[5] != ""){
	            	echo "<td style='width:100px;'>" . $sdinfo[5] . "</td>";
	            }
	            echo "<td style='width:100px;'>" . $sdinfo[8] . "</td>";

	            if($sdinfo[2] == "Deposit"){
	            	$actualBalance = $actualBalance + $sdinfo[6];
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . number_format($sdinfo[6],'2','.',',') . "</td>";
	            }else{
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . "-" . "</td>";
	            }

	            if($sdinfo[2] == "Withdraw"){
	            	$actualBalance = $actualBalance - $sdinfo[6];
	            	echo "<td " . "style=" . "color:orange;width:100px;" . ">" . number_format($sdinfo[6],'2','.',',') . "</td>";
	            }else{
	            	echo "<td " . "style=" . "color:orange;width:100px;" . ">" . "-" . "</td>";
	            }  

	            if($sdinfo[2] == "Retention"){
	            	$actualBalance = $actualBalance + $sdinfo[6];
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . number_format($sdinfo[6],'2','.',',') . "</td>";
	            }else{
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . "-" . "</td>";
	            }

	            if($sdinfo[2] == "Interest"){
	            	$actualBalance = $actualBalance + $sdinfo[6];
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . number_format($sdinfo[6],'2','.',',') . "</td>";
	            }else{
	            	echo "<td " . "style=" . "color:#21e5d6;width:100px;" . ">" . "-" . "</td>";
	            }
	            echo "<td " . "style=" . "color:#42FF33;width:100px;" . ">" . number_format($actualBalance,'2','.',',') . "</td>";
	        echo "</tr>";
	        $sdcounter ++;
	    }
	echo "</div>
	</div";
}

?>