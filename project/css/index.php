<html>
<!--
This is just a test page to work off of
We'll require actual javascript and PHP
verification later --Dylan
-->
<?php
//Set the time to 3600
$time = 3600;
// Set the session name, id , time + time integer value
setcookie(session_name(), session_id(), time() + $time);
session_start();




// TODO SQL injection protection
// Check if the user has already logged in
if (isset($_SESSION['loginForm'], $_SESSION['passwordForm'])) {

    //$userEmail = $_SESSION['loginForm'];
    //$password = $_SESSION['passwordForm'];
	header("location:http://209.141.52.178/project/project/php/processLogin.php"); 

//if The user has the correct username and password they can access the calendar
} 
//If user isn't logged in, don't show the calendar
elseif(!isset($userEmail,$password)){
echo "";
?>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="project/js/bootstrap.min.js"></script>
    <script src="project/js/jquery.validate.js"></script>
    <script src="project/js/validator.js"></script>

    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="project/css/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" href="project/css/style.css" media="screen"/>

    <title>Create a new user</title>
</head>

<body>
<div class="navbar-wrapper">
    <div class="container">
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".new-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="#" class="brand">Project</a>

                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active">
					
                            <a href="project/createUser.html">Create User</a>
                        </li>

                        <li class="active">
                            <a href="project/userEntryTest.html">User Entry Test</a>
                        </li>

                        <li class="active">
                            <a href="project/login.html">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1>WELCOME</h1>

    <h2>UNDER CONSTRUCTION</h2>
</div>
</body>
</html> 
<?php
}
?>

