<?php
//Stop the cookie by subtracting the time number from time
if (isset($_COOKIE[session_name()])) {
	setcookie(session_name(), '', time()-$time, '/');
}
session_destroy();
//Redirect back to the login page after logging out
 header("location:http://209.141.52.178/project/index.php?s=login");
?>
