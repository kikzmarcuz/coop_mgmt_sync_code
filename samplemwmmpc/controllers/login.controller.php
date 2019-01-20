<?php
require '../models/login.model.php';

$fpara = ($_GET['una']);
$spara = ($_GET['upa']);

$ucount = 0;
$ucount=getUserInfo($fpara, $spara);

if($ucount > 0){
	echo "true";
}else{
	echo "false";
}

?>