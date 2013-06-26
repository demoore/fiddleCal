<?php
/**
 * User: dylan
 * Date: 2013-05-01
 * Time: 10:52 AM
 */

include("session.php");
include("project/php/entryClass.php");


//if The user has the correct username and password they can access the calendar
if (!isset($_SESSION['loginForm'], $_SESSION['passwordForm']) && isset($_POST['loginForm'], $_POST['passwordForm'])) {
// First we get the parameters
    $userEmail = $_POST['loginForm'];
    $password = $_POST['passwordForm'];
    


}
//If nothing was typed head back to the login page
if (!isset($userEmail, $password) || $userEmail == "" && $password == "") {
   $_SESSION['loginForm'] = null;
   $_SESSION['passwordForm'] = null;  
   include("project/php/includes.inc");
   include("project/php/navbar.inc");
   include("project/badLogin.html");
}
elseif (isset($userEmail, $password)) {

    require('databaseAccess.php');
// This query will return all the data, we may just have to change
// the scope to the table name we're trying to access
    $userQuery = "SELECT * FROM users WHERE
              userEmail = \"$userEmail\" AND userPassword = \"$password\"";
//Make sure the login is correct
// Make the connection...
    $DBConnection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// ... and ensure it works
    if (mysqli_connect_errno($DBConnection)) {
        echo "Failed to connect to the database: " . mysqli_connect_error();
        exit();
        include("project/login.php");
    }

    $queryResults = $DBConnection->query($userQuery) or die(mysqli_error($DBConnection));
    $userInfo = $queryResults->fetch_object();

    //Determine that the user has a valid username or password
    if ($queryResults->num_rows == 1) {
		$_SESSION['loginForm'] = $userEmail;
		$_SESSION['passwordForm'] = $password;
        include("project/php/includes.inc");
        include("project/php/navbar.inc");
        include("project/calendarUser.php");
        echo "<script src=\"project/js/jquery.calendario.js\"></script>";

    }
	
    // ask the user to check there mistakes if they made an error with the username and password.
    If ($queryResults->num_rows == null) {
		$_SESSION['loginForm'] = "";
        $_SESSION['passwordForm'] = "";
		include("project/php/includes.inc");
		include("project/php/navbar.inc");
        echo "<title>Login</title>";
        
        
        include("project/badLogin.html");

    }
}



