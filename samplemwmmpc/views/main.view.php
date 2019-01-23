<?php  
//require_once 'session.php';
//require ("function.php");
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="kikz" content="">
    <title>CMS</title>

    <link href="../public/bootstrap-4.0.0-dist/css/bootstrap.css" rel="stylesheet">
    <script src="../public/js/jquery.min.js"></script>

    <link href="../css/css2.css?n=5" rel="stylesheet">
    <script src="../js/javascript.js?n=5"></script>
    <script src="../js/jquery.js?n=3"></script>

</head>

<body>
	<div id="headbar" class="headerbar">
        <h5 style="color: rgb(0,255,0);font-size: 50; font-weight: 700">CMS</h5>
        <h5 style="color: rgb(0,255,0);font-size: 20; font-weight: 500">Maligaya Wet Market Multi-Purpose Cooperative</h5>
	</div>

    <div class="main">
        <div id="logindiv" class="loginbody">
            <h1 class="frametext"><span class="frametitle">Login information</span></h1>
            <div class="fieldcontainerparent">
                <div class="fieldcontainerchild">
                    
                        <div class="formcontainer">
                            <label>Username</label>
                            <input type="text" id="username" name=""><br>
                            <label>Password</label>
                            <input type="text" id="password" name=""><br>
                            <label></label>
                            <button onclick="userlogin()" class="searchbut">SUBMIT</button>
                        </div>
                    
                </div>
            </div>
        </div>
        <div id="navigationbar" class="navigationbar">
            <?php include 'navigation.view.php';?>
        </div>


        <div id="workarea" class="workareabar">
        </div>
    </div>
	
</body>

</html>