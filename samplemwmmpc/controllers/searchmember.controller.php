<?php
require('../public/fpdf181/fpdf.php');
require '../models/searchmember.model.php';


$function = ($_GET['method']);

if ($function == "searchmember"){
	$para = ($_GET['sm']);
	$minfo=[];
	$minfol=[];
	$minfo=getMemberInfoS($para, "i");

	echo "<datalist id='listnames'>";
		$minfoc=[];
		$minfol=[];
		$minfol=getMemberInfoS($para, "l");
		$minfocount = count($minfol);
		$minfocounter = 0;

		while($minfocounter < $minfocount){
			$minfoc=$minfol[$minfocounter];
			$name = $minfoc[0] . " " . $minfoc[4] . ", " .  $minfoc[2] . " " . $minfoc[3];
			echo "<option value='" . $name . "'' >" ;
			$minfocounter++;
		}
	echo "</datalist>";
}

?>