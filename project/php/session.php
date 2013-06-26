<?php
//Session.php created by Gus Lally
// April 30, 2013 8:57 pm

//Set the time to 3600
$time = 3600;
// Set the session name, id , time + time integer value
setcookie(session_name(), session_id(), time() + $time);
session_start();




// Check if the user has already logged in
if (isset($_SESSION['loginForm'], $_SESSION['passwordForm'])) {

    $userEmail = $_SESSION['loginForm'];
    $password = $_SESSION['passwordForm'];

} 

?>