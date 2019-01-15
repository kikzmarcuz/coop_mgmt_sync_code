<?php  
require_once 'session.php';
require ("function.php");



?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="kikz" content="">
    <title>MWMMPC</title>

    <link href="public/bootstrap-4.0.0-dist/css/bootstrap.css" rel="stylesheet">
    <link href="css2.css?n=10" rel="stylesheet">
    <script src="public/js/jquery.min.js"></script>
    <script src="javascript.js?n=3"></script>
    <script src="jquery.js?n=3"></script>

</head>

<body>
	<div id="headbar" class="headerbar">
        <h5 style="color: rgb(0,255,0);font-size: 50; font-weight: 700">CMS</h5>
        <h5 style="color: rgb(0,255,0);font-size: 20; font-weight: 500">Maligaya Wet Market Multi-Purpose Cooperative</h5>
	</div>

    <div class="main">
        <div class="navigationbar">
            <?php include 'mainnavigation.php';?>
        </div>


        <div id="workarea" class="workareabar">
        </div>
    </div>
	
</body>

</html>