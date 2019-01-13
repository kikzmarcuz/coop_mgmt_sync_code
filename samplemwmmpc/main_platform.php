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
    <link href="css2.css?n=7" rel="stylesheet">
    <script src="public/js/jquery.min.js"></script>
    <script src="javascript.js?n=2"></script>
    <script src="jquery.js?n=2"></script>

</head>

<body>
	<div id="headbar" class="headerbar">
		<label>MAIN</label>
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